import  ( Customer ) from "../../../includes/view/customer.view.js";

const parent = =document.getElementById("customer-data");

window.onload = function () {
  axios
    .get("/web/includes/controllers/getAllCustomers.controller.php")
    .then((response) => {
        const customers = response.data;
        customers.forEach((item) => {
          const {
            id,
            date,
            name,
          } = item;
          const customer = new Custoomer(id, name, date);
          customeer.render(parent);
        });
  });
 };
  // Load customers here
  // steps:
  // see /admin/dashboard/events/js/index.js
