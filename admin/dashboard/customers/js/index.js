"use strict"

import  { Customer } from "../../../includes/view/customer.view.js";

const parent = document.getElementById("customer-data");

window.onload = function () {
  axios
    .get("/web/admin/includes/controllers/get-all-customers.controller.php")
    .then((response) => {
      const customers = response.data;
      customers.forEach((item) => {
        const { firstName, lastName, email, phone, age, bookings } = item;
        const customer = new Customer(`${firstName} ${lastName}`, email, phone, age, bookings.length);
        customer.render(parent);
      });
  });
 };