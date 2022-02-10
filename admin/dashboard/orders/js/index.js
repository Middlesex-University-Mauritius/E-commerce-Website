import { Order } from "../../../includes/view/order.view.js";

const parent = document.getElementById("order-data");

window.onload = () => {
  axios
    .get("/web/admin/includes/controllers/view-orders.controller.php")
    .then((response) => {
      const orders = response.data;
      orders.forEach((item) => {
        console.log(item)
        const {
          timestamp: { $date: { $numberLong: date } },
          event,
          customer,
          seats,
          subtotal
        } = item;
        const order = new Order(date, customer.firstName, event._id.$oid, event.category, Object.keys(seats).length, subtotal);
        order.render(parent);
      });
    });
};