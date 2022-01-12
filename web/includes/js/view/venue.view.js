let selections = {};
let subtotal = 0;

const emptyMessage = (content) => {
  const message = document.createElement("p");
  message.innerText = "No tickets. click on seat to reserve."
  message.className = "text-center text-gray-700 py-10 select-none";
  content.append(message);
}

export class Venue {
  container = document.createElement("div");
  parent = null;

  constructor(parent) {
    this.container.className = "venue-container";
    this.container.id = "venue-container"
    this.parent = parent;
  }

  render() {
    this.parent.append(this.container);
  }
}

export class Section extends Venue {
  section = document.createElement("div");
  height = 0;
  width = 0;
  type = null;
  capacity = 0;

  SEAT_SIZE = 50;
  SEAT_SPACING = 23;
  seats = {};
  seatsContent = document.getElementById("tabs-content-seats");

  constructor(type, width = 600, height = 220) {
    super();
    this.type = type;
    this.height = height;
    this.width = width;
    this.capacity =
      (this.width / this.SEAT_SIZE) * (this.height / this.SEAT_SIZE);
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

  getAvailability(data) {
    data.forEach((seat) => {
      const id = `${seat.type}${seat.col}${seat.row}`;

      this.seats[id] = {
        ...seat,
        disabled: seat.customer ? true : false,
      };
    });
  }

  populateSeats() {
    const subtotalComponent = document.getElementById("subtotal")

    for (let i = 0; i <= this.width - this.SEAT_SIZE; i += this.SEAT_SIZE) {
      for (let j = 0; j <= this.height - this.SEAT_SIZE; j += this.SEAT_SIZE) {
        const [x, y] = [
          Math.floor(i / this.SEAT_SIZE),
          Math.floor(j / this.SEAT_SIZE),
        ];

        const id = `${this.type}${x}${y}`;

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

        parent.append(circle);

        if (this.seats[id] && this.seats[id].customer) {
          circle.classList.add("active");
        }

        circle.addEventListener("click", () => {
          const content = document.getElementById("content");

          if (this.seats[id] && this.seats[id].disabled) {
            return;
          }

          if (selections[id]) {
            circle.classList.remove("active");
            circle.childNodes[0].remove();
            delete selections[id];
            subtotal -= this.getPrice();
          } else {
            const icon = document.createElement("i");
            icon.className = "fas fa-check";
            circle.classList.add("active");
            circle.append(icon);
            selections[id] = {
              row: y,
              col: x,
              type: this.type,
              price: this.getPrice(),
            };
            subtotal += this.getPrice();
          }

          content.innerHTML = null;

          if (Object.keys(selections).length === 0) {
            emptyMessage(content);
          } else {
            Object.keys(selections).map((id) => {
              const s = selections[id];

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
              seatNo.innerText = `R${s.row}C${s.col}`;
              header.append(title, seatNo)

              const deleteBtn = document.createElement("p");
              deleteBtn.className = "my-auto underline cursor-pointer text-red-700 hover:text-red-600 select-none";
              deleteBtn.innerText = "Delete";
              deleteBtn.addEventListener("click", () => {
                subtotal -= s.price;
                card.remove();
                delete selections[id];
                const seat = document.getElementById(id);
                seat.classList.remove("active");
                seat.childNodes[0].remove();
                subtotalComponent.innerText = subtotal;

                if (Object.keys(selections).length === 0) {
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


          subtotalComponent.innerText = subtotal;
        });

        this.section.append(parent);
      }
    }
  }
}
