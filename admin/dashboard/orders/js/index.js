import { Order } from "../../../includes/view/order.view.js";

const parent = document.getElementById("order-data");

// Get all bookings/orders for all customers
window.onload = () => {
  axios
    .get("/web/admin/includes/controllers/view-orders.controller.php")
    .then((response) => {
      const orders = response.data;
      orders.forEach((item) => {
        const {
          timestamp: { $date: { $numberLong: date } },
          event: { _id: { $oid: eventId }, category },
          customer: { firstName },
          seats,
          subtotal
        } = item;

        // Render the items using Order view
        const order = new Order(date, firstName, eventId, category, Object.keys(seats).length, subtotal);
        order.render(parent);
      });
    });
};