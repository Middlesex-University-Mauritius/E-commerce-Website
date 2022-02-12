import { Booking } from "../../includes/js/view/booking.view.js";

// bookings
const customerBookings = document.getElementById("bookings");

// Empty bookings
const emptyBookingsMessage = document.getElementById("bookings-empty");

window.onload = function () {
  axios
    .get("/web/includes/controllers/customer-bookings.controller.php")
    .then((response) => {
      const { data } = response;
      if (!data) return;

      const orders = data;

      if (orders.length >= 1) {
        customerBookings.hidden = false;
        emptyBookingsMessage.hidden = true;
      }

      orders.map((order) => {
        const { event_id: { $oid: id }, event } = order;

        const bookingView = new Booking(
          id,
          event.date,
          event.title,
          event.description
        );
        bookingView.render(customerBookings);
      });
    });
};
