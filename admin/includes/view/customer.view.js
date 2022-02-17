import { Booking } from "../../../includes/js/view/booking.view.js";
import { formatNumber } from "../../../includes/js/scripts/core.js";

export class Customer {
  id = null;
  name = null;
  email = null;
  phone = null;
  age = null;
  bookings = null;

  constructor(id, name, email, phone, age, bookings) {
    this.id = id;
    this.name = name;
    this.email = email;
    this.phone = phone;
    this.age = age;
    this.bookings = bookings;
  }

  render(parent) {
    const tr = document.createElement("tr");
    tr.className = "fade";

    const customerData = document.createElement("td");
    const customerContainer = document.createElement("div");
    customerContainer.className = "flex space-x-3";
    const customerImage = document.createElement("img");
    customerImage.className = "rounded-full w-8 h-8 border";
    customerImage.src = "/web/includes/img/avatar.png";
    const customerName = document.createElement("p");
    customerName.className =
      "my-auto text-blue-700 cursor-pointer hover:underline name";
    customerName.innerText = this.name;
    customerContainer.append(customerImage, customerName);
    customerData.append(customerContainer);

    customerName.addEventListener("click", async () => {
      const bookingSidebar = document.getElementById("right-sidebar");
      bookingSidebar.classList.add("right-0");
      const parent = document.getElementById("right-sidebar-content");
      parent.innerHTML = null;

      const api = "/web/includes/controllers/customer-bookings.controller.php";
      const response = await axios.get(api, {
        params: { customer_id: this.id },
      });
      const { data } = response;

      if (!data) {
        const emptyMessage = document.createElement("p");
        emptyMessage.className = "text-gray-700 text-center";
        emptyMessage.innerText = "This customer does not have bookings yet";
        parent.append(emptyMessage);
        return;
      }
      const orders = data;

      orders.map((order) => {
        console.log(order);
        const {
          event_id: { $oid: id },
          event,
        } = order;

        const bookingView = new Booking(
          id,
          event.date,
          event.title,
          event.description
        );
        bookingView.render(parent);
      });
    });

    const emailData = document.createElement("td");
    emailData.innerText = this.email;

    const phoneData = document.createElement("td");
    phoneData.innerText = this.phone;

    const ageData = document.createElement("td");
    ageData.innerText = this.age;

    const bookingsData = document.createElement("td");
    bookingsData.innerText = formatNumber(this.bookings);

    tr.append(customerData, emailData, phoneData, ageData, bookingsData);
    parent.append(tr);
  }
}
