"use strict"

import { formatNumber } from "../../../includes/js/scripts/core.js";

export class Seat {
  id = null;
  row = null;
  col = null;
  price = null;
  type = null;

  constructor(id, row, col, price, type) {
    this.id = id;
    this.row = row;
    this.col = col;
    this.price = price;
    this.type = type;
  }

  render(parent) {
    const card = document.createElement("div");
    card.className = "tickets-content-card";

    const titleContainer = document.createElement("div");
    titleContainer.className = "flex justify-between";

    const header = document.createElement("div");
    const title = document.createElement("p");
    title.className = "text-md font-bold";
    title.innerText = this.type.toUpperCase();
    const seatNo = document.createElement("p");
    seatNo.className = "seat-no";
    seatNo.innerText = `${this.type.toUpperCase()}-R${this.row}C${this.col}`;
    header.append(title, seatNo);

    titleContainer.append(header);

    const more = document.createElement("div");
    more.className = "more";
    const abbreviated = document.createElement("p");
    abbreviated.className = "abbrevated";
    abbreviated.innerText = `row ${this.row} column ${this.col}`;
    const price = document.createElement("p");
    price.innerText = `Rs ${formatNumber(this.price)}`;
    more.append(abbreviated, price);

    card.append(titleContainer, more);

    parent.append(card);
  }
}
