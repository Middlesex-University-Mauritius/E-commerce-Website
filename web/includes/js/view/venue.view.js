import { Storage } from "../scripts/storage.js";

const storage = new Storage("selections", {});
let selections = storage.get();

export class Venue {
  container = document.createElement("div");
  parent = null;

  constructor(parent) {
    this.container.className = "venue-container";
    this.parent = parent;
  }

  render() {
    this.parent.append(this.container);
  }
}


export class Section extends Venue {
  section = document.createElement("div");
  height = 0
  width = 0
  type = null
  capacity = 0

  SEAT_SIZE = 50;
  SEAT_SPACING = 23;
  seats = {};

  constructor(type, width = 600, height = 220) {
    super();
    this.type = type
    this.height = height
    this.width = width
    this.capacity = (this.width / this.SEAT_SIZE) * (this.height / this.SEAT_SIZE)
  }

  render(parent) {
    this.section.style.height = `${this.height}px`;
    this.section.style.width = `${this.width}px`;
    this.section.className = "section";
    this.section.id = this.type;
    parent.append(this.section);
  }

  getSeats() {
    return this.seats;
  }

  getPrice() {
    switch(this.type) {
      case "vip":
        return 900
      case "premium":
        return 700
      case "regular":
        return 300
      default:
        return 0
    }
  }

  populateSeats() {
    for (let i = 0; i <= this.width - this.SEAT_SIZE; i += this.SEAT_SIZE) {
      for (let j = 0; j <= this.height - this.SEAT_SIZE; j += this.SEAT_SIZE) {
        const parent = document.createElement("div");
        parent.className = "seat-parent";
        parent.style.top = j + "px";
        parent.style.left = i + "px";
        parent.style.height = this.SEAT_SIZE + "px";
        parent.style.width = this.SEAT_SIZE + "px";

        const circle = document.createElement("div");
        circle.className = "seat";
        circle.style.height = this.SEAT_SIZE - this.SEAT_SPACING + "px";
        circle.style.width = this.SEAT_SIZE - this.SEAT_SPACING + "px";

        parent.append(circle);

        const [x, y] = [Math.floor(i / this.SEAT_SIZE), Math.floor(j / this.SEAT_SIZE)]

        const id = `${this.type}${x}${y}`

        if (selections[id]) {
          const icon = document.createElement("i");
          icon.className = "fas fa-check";
          circle.classList.add("active");
          circle.append(icon);
        }

        const data = {
          row: y,
          col: x,
          type: this.type,
          price: this.getPrice()
        }

        this.seats[id] = data;

        circle.addEventListener("click", (event) => {
          if (selections[id]) {
            circle.classList.remove("active");
            circle.childNodes[0].remove();
            circle.style.background = "#A4A5A7";
            delete selections[id];
          } else {
            const icon = document.createElement("i");
            icon.className = "fas fa-check";
            circle.classList.add("active");
            circle.append(icon);
            selections[id] = data;
          }

          storage.set(selections);
        })

        this.section.append(parent);
      }
    }
  }
}