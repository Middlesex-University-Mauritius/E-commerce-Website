"use strict"

import { formatNumber } from "../../includes/js/scripts/core.js"
import { Seat } from "../../includes/js/view/seat.view.js"

export class Booking {
  id = null;
  date = null;
  eventName = null;
  category = null;
  charge = null;
  seats = null

  constructor(id, date, eventName, category, seats, charge) {
    this.id = id;
    this.date = date;
    this.eventName = eventName;
    this.category = category;
    this.seats = seats;
    this.charge = charge;
  }

  render(parent) {
    const tr = document.createElement("tr");
    const dateData = document.createElement("td");
    const eventNameData = document.createElement("td");
    const categoryData = document.createElement("td");
    const ticketsData = document.createElement("td");
    const chargeData = document.createElement("td");
    const seatsData = document.createElement("td");

    // Event name
    eventNameData.innerText = this.eventName;

    // Category
    const category = document.createElement("span");

    if (this.category === "live-music")
      category.className = "bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "stand-up")
      category.className = "bg-green-200 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "arts-and-theater")
      category.className = "bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"

    category.innerText = this.category;
    categoryData.append(category)

    // Tickets
    ticketsData.innerText = `x${Object.keys(this.seats).length}`;

    // Date
    dateData.innerText = this.date;

    // Charge
    chargeData.innerText = `Rs ${formatNumber(this.charge)}`;

    seatsData.innerText = "View";
    seatsData.className = "text-blue-700 cursor-pointer seats"
    seatsData.addEventListener("click", () => {
      window.bookingIdToCancel = this.booking_id;
      window.customerIdToCancel = this.customer_id;
      const bookingSidebar = document.getElementById("right-sidebar");
      bookingSidebar.classList.add("right-0");
      const parent = document.getElementById("right-sidebar-content");
      parent.innerHTML = null;

      Object.keys(this.seats).map((id) => {
        const { row, col, price, type } = this.seats[id];
        const seatView = new Seat(id, row, col, price, type);
        seatView.render(parent);
      })

    })

    tr.append(
      eventNameData,
      categoryData,
      ticketsData,
      dateData,
      chargeData,
      seatsData
    );

    parent.append(tr);
  }
}
