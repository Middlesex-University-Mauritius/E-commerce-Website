import { Booking } from "../../../includes/view/booking.view.js";

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
          event: { category },
          customer: { firstName },
          address: { streetAddress },
          seats,
          subtotal
        } = item;

        // Render the items using Order view
        const order = new Booking(date, firstName, streetAddress, category, Object.keys(seats).length, subtotal);
        order.render(parent);
      });
    });
};