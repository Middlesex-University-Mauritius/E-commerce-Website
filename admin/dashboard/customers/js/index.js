"use strict"

import  { Customer } from "../../../includes/view/customer.view.js";
import { renderTable } from "../../../../includes/js/view/table.view.js";

// Booking sidebar
const bookingSidebar = document.getElementById("right-sidebar");

// Sidebar close button
const sidebarCloseButton = document.getElementById("right-sidebar-close");

// Filter options
const bookingOnlyFilter = document.getElementById("bookings-only-filter");

// Parent element to render customers data
const customerTable = document.getElementById("customer-table");

const fetchCustomers = async (params = {}) => {
  const api = "/web/admin/includes/controllers/get-all-customers.controller.php";
  const response = await axios.get(api, { params });
  const customers = response.data;

  if (!customers || customers.length === 0) {
    customerTable.innerHTML = null;
    customerTable.innerText = "No customers to display";
    return
  }

  renderTable(customerTable, ["Customer Name", "Email", "Phone", "Age", "Bookings"], "customer-data")

  customers.forEach((item) => {
    const { firstName, lastName, email, phone, age, bookings, _id: { $oid: customer_id } } = item;
    const customer = new Customer(customer_id, `${firstName} ${lastName}`, email, phone, age, bookings.length);
    customer.render(document.querySelector("#customer-data"));
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
  if (!document.getElementById('right-sidebar').contains(e.target) && !e.target.classList.contains("name")){
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