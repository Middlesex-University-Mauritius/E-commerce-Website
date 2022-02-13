import { Booking } from "../view/booking.view.js";

// Customer bookings
const bookingData = document.getElementById("booking-data");
const bookingTable = document.getElementById("booking-table");

// Customer fields
const customerFields = document.getElementById("customer-fields");

// Edit details button
const editDetails = document.getElementById("edit-details");

let fields = {}

window.onload = function () {
  // Populate customer details
  axios
    .get("/web/includes/controllers/get-profile.controller.php")
    .then((response) => {
      const { success, user } = response.data;

      fields = {
        "First Name": user.firstName,
        "Last Name": user.lastName,
        "Email": user.email,
        "Age": user.age,
        "Phone": user.phone
      }

      if (success) {
        Object.keys(fields).map((field) => {
          const container = document.createElement("div");
          container.className = "flex justify-between py-3";
          if (field !== "Phone") container.classList.add("border-b");

          const fieldTitle = document.createElement("p");
          fieldTitle.className = "font-medium my-auto";
          fieldTitle.innerText = field;

          const fieldValue = document.createElement("p");
          fieldValue.className = "text-gray-700";
          fieldValue.id = field;
          fieldValue.innerText = fields[field];

          container.append(fieldTitle, fieldValue)
          customerFields.append(container);
        })
      } else {
        window.location.href = "/web/signin";
      }
    });

  axios
    .get("/web/includes/controllers/customer-bookings.controller.php")
    .then((response) => {
      const { data } = response;
      const bookings = data;

      if (!bookings || bookings.length === 0) {
        bookingTable.innerHTML = null;
        bookingTable.innerText = "You didn't order anything yet"
        return
      }

      bookings.map((booking) => {
        const { event, subtotal, seats } = booking;

        const bookingView = new Booking(
          event._id.$oid,
          event.date,
          event.title,
          event.category,
          Object.keys(seats).length,
          subtotal
        );
        bookingView.render(bookingData);
      });
    });
};