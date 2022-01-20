const emptyMessage = (content) => {
  const message = document.createElement("p");
  message.innerText = "No tickets. click on seat to reserve."
  message.className = "text-center text-gray-700 py-10 select-none";
  content.append(message);
}

export class Venue {
  container = document.createElement("div");
  parent = null;
  selections = {}
  subtotal = 0;
  disabled = false;
  ratio = 1;

  constructor(parent, ratio = 1, disabled = false) {
    this.container.className = "venue-container";
    this.container.id = "venue-container"
    this.parent = parent;
    this.ratio = ratio;
    this.disabled = disabled;
  }

  render() {
    this.parent.append(this.container);
  }

  getSelections = (id) => id ? this.selections[id] : this.selections;
  deleteSelection = (id) => delete this.selections[id]
  setSelections = (id, data) => this.selections[id] = data;
  getSubtotal = () => this.subtotal
  setSubtotal = (total) => this.subtotal = this.subtotal + total
}

export class Section {
  section = document.createElement("div");
  height = 0;
  width = 0;
  type = null;
  capacity = 0;

  SEAT_SIZE = 50;
  SEAT_SPACING = 23;
  seats = {};
  seatsContent = document.getElementById("tabs-content-seats");
  venue = null;

  constructor(venue, type, width = 600, height = 220) {
    this.type = type;
    this.height = height / venue.ratio;
    this.width = width / venue.ratio;
    this.SEAT_SIZE = this.SEAT_SIZE / venue.ratio;
    this.SEAT_SPACING = this.SEAT_SPACING / venue.ratio;
    this.capacity =
      (this.width / this.SEAT_SIZE) * (this.height / this.SEAT_SIZE);
    this.venue = venue;
  }

  render(parent, label=null) {
    this.section.style.height = `${this.height}px`;
    this.section.style.width = `${this.width}px`;
    this.section.className = "section";
    this.section.id = this.type;
    if (label) {
      this.section.style.background = "#727272";
      const text = document.createElement("p");
      text.innerText = label;
      text.className = `text-center text-4xl mt-[${(this.height / 2) - 22}px] text-white`
      this.section.append(text);
    }
    parent.append(this.section);
  }

  getSeats() {
    return this.seats;
  }

  getPrice() {
    switch (this.type) {
      case "vip":
        return 900;
      case "premium":
        return 700;
      case "regular":
        return 300;
      default:
        return 0;
    }
  }

  getAvailability(data, local=false) {
    data.forEach((seat) => {
      const id = `${seat.type.toUpperCase()}-R${seat.row}C${seat.col}`;

      this.seats[id] = {
        ...seat,
        disabled: seat.customer ? true : false,
        local
      };
    });
  }

  updateSidebar() {
    const content = document.getElementById("content");
    const subtotalComponent = document.getElementById("subtotal")
    content.innerHTML = null;

    if (Object.keys(this.venue.getSelections()).length === 0) {
      emptyMessage(content);
    } else {
      Object.keys(this.venue.getSelections()).map((id) => {
        const s = this.venue.getSelections(id);

        const card = document.createElement("div");
        card.className = "tickets-content-card"

        const titleContainer = document.createElement("div");
        titleContainer.className = "flex justify-between";

        const header = document.createElement("div");
        const title = document.createElement("p");
        title.className = "text-md font-bold";
        title.innerText = s.type.toUpperCase();
        const seatNo = document.createElement("p");
        seatNo.className = "seat-no";
        seatNo.innerText = `${this.type.toUpperCase()}-R${s.row}C${s.col}`;
        header.append(title, seatNo)

        const deleteBtn = document.createElement("p");
        deleteBtn.className = "my-auto underline cursor-pointer text-red-700 hover:text-red-600 select-none";
        deleteBtn.innerText = "Delete";
        deleteBtn.addEventListener("click", () => {
          this.venue.setSubtotal(s.price * -1)
          card.remove();
          this.venue.deleteSelection(id);
          const seat = document.getElementById(id);
          seat.classList.remove("active");
          seat.childNodes[0].remove();
          subtotalComponent.innerText = this.venue.getSubtotal();

          if (Object.keys(this.venue.getSelections()).length === 0) {
            emptyMessage(content);
          }
        })

        titleContainer.append(header, deleteBtn);

        const more = document.createElement("div");
        more.className = "more";
        const abbreviated = document.createElement("p");
        abbreviated.className = "abbrevated";
        abbreviated.innerText = `row ${s.row} column ${s.col}`;
        const price = document.createElement("p");
        price.innerText = `Rs ${s.price}`;
        more.append(abbreviated, price);

        card.append(titleContainer, more);

        content.append(card);
      })
    }

    subtotalComponent.innerText = this.venue.getSubtotal();
  }

  setSeat(circle, id, x, y) {
    const icon = document.createElement("i");
    icon.className = "fas fa-check";
    circle.classList.add("active");
    circle.append(icon);

    this.venue.setSelections(id, {
      row: y,
      col: x,
      type: this.type,
      price: this.getPrice(),
    })

    this.venue.setSubtotal(this.getPrice());
  }

  populateSeats() {
    for (let i = 0; i <= this.width - this.SEAT_SIZE; i += this.SEAT_SIZE) {
      for (let j = 0; j <= this.height - this.SEAT_SIZE; j += this.SEAT_SIZE) {
        const [x, y] = [
          Math.floor(i / this.SEAT_SIZE),
          Math.floor(j / this.SEAT_SIZE),
        ];

        const id = `${this.type.toUpperCase()}-R${y}C${x}`;

        if (!this.seats[id]) {
          this.seats[id] = {
            row: y,
            col: x,
            type: this.type,
            price: this.getPrice(),
            customer: null,
            disabled: false
          }
        }

        const parent = document.createElement("div");
        parent.className = "seat-parent";
        parent.style.top = j + "px";
        parent.style.left = i + "px";
        parent.style.height = this.SEAT_SIZE + "px";
        parent.style.width = this.SEAT_SIZE + "px";

        const circle = document.createElement("div");
        circle.className = "seat";
        circle.id = id;
        circle.style.height = this.SEAT_SIZE - this.SEAT_SPACING + "px";
        circle.style.width = this.SEAT_SIZE - this.SEAT_SPACING + "px";

        if (!this.venue.disabled) circle.style.cursor = "pointer";

        parent.append(circle);

        if (this.seats[id].local) {
          this.setSeat(circle, id, x, y);
          this.updateSidebar();
        }

        if (this.seats[id] && this.seats[id].customer) {
          circle.classList.add("active");
        }

        if (!this.venue.disabled) {
          circle.addEventListener("click", () => {
            if (this.seats[id] && this.seats[id].disabled) {
              return;
            }

            if (this.venue.getSelections(id)) {
              circle.classList.remove("active");
              circle.childNodes[0].remove();
              this.venue.deleteSelection(id);
              this.venue.setSubtotal(this.getPrice() * -1)
            } else {
              this.setSeat(circle, id, x, y);
              this.venue.setSubtotal(this.getPrice())
            }

            this.updateSidebar();
          });
        }

        this.section.append(parent);
      }
    }
  }
}

