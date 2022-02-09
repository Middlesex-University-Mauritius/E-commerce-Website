import { Booking } from "../view/booking.view.js";

// Customer details
const fullName = document.getElementById("full-name");
const email = document.getElementById("email");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

// Customer bookings
const customerBookings = document.getElementById("customer-bookings");

// Empty bookings
const emptyBookingsMessage = document.getElementById("customer-bookings-empty");

window.onload = function () {
  // Populate customer details
  axios
    .get("/web/includes/controllers/get-profile.controller.php")
    .then((response) => {
      const { success, user } = response.data;

      if (success) {
        fullName.innerText = `${user.firstName} ${user.lastName}`;
        email.innerText = user.email;
        age.innerText = user.age;
        phone.innerText = user.phone;
      } else {
        window.location.href = "/web/signin";
      }
    });

  axios
    .get("/web/includes/controllers/customer-bookings.controller.php")
    .then((response) => {
      const { data } = response;
      if (!data) return;

      const bookings = data;

      if (bookings.length >= 1) {
        customerBookings.hidden = false;
        emptyBookingsMessage.hidden = true;
      }

      bookings.map((booking) => {
        const { event_id, event, subtotal, seats } = booking;

        const bookingView = new Booking(
          event.date,
          event.title,
          event_id.$oid,
          event.category,
          Object.keys(seats).length,
          subtotal
        );
        bookingView.render(customerBookings);
      });
    });
};
