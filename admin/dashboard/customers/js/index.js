"use strict"

import { Booking } from "../../../../includes/js/view/booking.view.js";
import  { Customer } from "../../../includes/view/customer.view.js";

// Booking sidebar
const bookingSidebar = document.getElementById("booking-sidebar");

// Sidebar close button
const sidebarCloseButton = document.getElementById("sidebar-close");

// Filter options
const bookingOnlyFilter = document.getElementById("bookings-only-filter");

// Parent element to render customers data
const parent = document.getElementById("customer-data");

const fetchCustomers = async (params = {}) => {
  parent.innerHTML = null;
  const api = "/web/admin/includes/controllers/get-all-customers.controller.php";
  const response = await axios.get(api, { params });
  const customers = response.data;
  customers.forEach((item) => {
    const { firstName, lastName, email, phone, age, bookings, _id: { $oid: customer_id } } = item;
    const customer = new Customer(customer_id, `${firstName} ${lastName}`, email, phone, age, bookings.length);
    customer.render(parent);
  });
}

// Fetch customers on mount
window.onload = () => {
  fetchCustomers();
 };

 // Filter functions
bookingOnlyFilter.addEventListener("change", (event) => {
  fetchCustomers({
    withBookingQuantity: event.target.checked
  })
})

// Detect outside click
window.addEventListener('click', function(e){   
  if (!document.getElementById('booking-sidebar').contains(e.target) && !e.target.classList.contains("name")){
    // Clicked outside the box
    bookingSidebar.classList.remove("right-0")
    bookingSidebar.classList.add("-right-[400px]")
  }
});

// Sidebar close
sidebarCloseButton.addEventListener("click", () => {
  bookingSidebar.classList.remove("right-0")
  bookingSidebar.classList.add("-right-[400px]")
})