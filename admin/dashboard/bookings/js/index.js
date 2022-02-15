"use strict"

import { Booking } from "../../../includes/view/booking.view.js";
import Notification from "../../../../includes/js/view/notification.view.js";

const bookingData = document.getElementById("booking-data");
const bookingTable = document.getElementById("booking-table");

// Booking sidebar
const ticketSidebar = document.getElementById("right-sidebar");

// Sidebar close button
const sidebarCloseButton = document.getElementById("right-sidebar-close");

// Fetch bookings
const fetchData = async () => {
  const api = "/web/admin/includes/controllers/view-orders.controller.php";
  const response = await axios.get(api)
  const bookings = response.data;

  // No bookings
  if (!bookings || bookings.length === 0) {
    bookingTable.innerHTML = null;
    bookingTable.innerText = "No bookings at the moment";
    return;
  }

  bookings.forEach((item) => {
    const {
      _id: { $oid: booking_id },
      timestamp: { $date: { $numberLong: date } },
      event: { category },
      customer: { firstName, _id: { $oid: customer_id } },
      address: { streetAddress },
      seats,
      total
    } = item;

    // Render the items using Order view
    const order = new Booking(booking_id, date, firstName, streetAddress, category, seats, total, customer_id);
    order.render(bookingData);
  });
}

// Get all bookings/orders for all customers
window.onload = () => {
  fetchData();
};

// Detect outside click
window.addEventListener('click', function(e){   
  if (!document.getElementById('right-sidebar').contains(e.target) && !e.target.classList.contains("seats")){
    // Clicked outside the box
    ticketSidebar.classList.remove("right-0")
    ticketSidebar.classList.add("-right-[400px]")
  }
});

// Sidebar close
sidebarCloseButton.addEventListener("click", () => {
  ticketSidebar.classList.remove("right-0")
  ticketSidebar.classList.add("-right-[400px]")
})

// Cancel booking
document.querySelector("#cancel-booking-button").addEventListener("click", async () => {
  ticketSidebar.classList.remove("right-0")
  ticketSidebar.classList.add("-right-[400px]")

  const api = "/web/admin/includes/controllers/cancel-booking.controller.php";
  const booking_id = window.bookingIdToCancel;
  const customer_id = window.customerIdToCancel;
  if (!booking_id || !customer_id) return;
  const response = await axios.delete(api, { params: { booking_id, customer_id } });

  const notification = new Notification(document.querySelector("#body"));

  if (!response.data) return;

  if (response.data.success) {
    notification.render("This booking has successfully been deleted", "success")
    fetchData();
  }

  window.bookingIdToCancel = null;
  window.customerIdToCancelw = null;
})