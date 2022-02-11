export class Customer {
  name = null;
  email = null;
  phone = null;
  age = null;
  bookings = null;

  constructor(name, email, phone, age, bookings) {
    this.name = name;
    this.email = email;
    this.phone = phone;
    this.age = age;
    this.bookings = bookings;
  }

  render(parent) {

    const tr = document.createElement("tr");

    const customerData = document.createElement("td");
    const customerContainer = document.createElement("div")
    customerContainer.className = "flex space-x-3";
    const customerImage = document.createElement("img");
    customerImage.className = "rounded-full w-8 h-8 border"
    customerImage.src = "/web/includes/img/avatar.png"
    const customerName = document.createElement("p");
    customerName.className = "my-auto";
    customerName.innerText = this.name;
    customerContainer.append(customerImage, customerName);
    customerData.append(customerContainer);

    const emailData = document.createElement("td");
    emailData.innerText = this.email;

    const phoneData = document.createElement("td");
    phoneData.innerText = this.phone;

    const ageData = document.createElement("td");
    ageData.innerText = this.age;

    const bookingsData = document.createElement("td");
    bookingsData.innerText = `x${this.bookings}`;

    tr.append(customerData, emailData, phoneData, ageData, bookingsData);
    parent.append(tr);
  }

}