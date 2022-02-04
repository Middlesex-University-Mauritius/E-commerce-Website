import { Booking } from "../view/booking.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

// bookings
const customerBookings = document.getElementById("bookings");

// Empty bookings
const emptyBookingsMessage = document.getElementById("bookings-empty");

window.onload = function () {
  axios
    .get("/web/includes/controllers/customerBookings.controller.php")
    .then((response) => {
      const { data } = response;
      if (!data) return;

      const orders = data;

      if (orders.length >= 1) {
        customerBookings.hidden = false;
        emptyBookingsMessage.hidden = true;
      }

      orders.map((order) => {
        const { event_id, event, subtotal, seats } = order;

        const bookingView = new Booking(
          event.date,
          event_id,
          event.title,
          event.description
        );
        bookingView.render(customerBookings);
      });
    });
};
