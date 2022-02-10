export class Order {
  date = null;
  name = null;
  eventId = null;
  category = null;
  tickets = null;
  charge = null;

  constructor(date, name, eventId, category, tickets, charge) {
    this.date = date;
    this.name = name;
    this.eventId = eventId;
    this.category = category;
    this.tickets = tickets;
    this.charge = charge;
  }

  render(parent) {

    const tr = document.createElement("tr");
    const dateData = document.createElement("td");
    const customerData = document.createElement("td");

    // Timestamp 
    dateData.innerText = moment(Number(this.date)).fromNow();

    // Customer details 
    const customerContainer = document.createElement("div")
    customerContainer.className = "flex space-x-3";
    const customerImage = document.createElement("img");
    customerImage.className = "rounded-full w-8 h-8 border"
    customerImage.src = "/web/includes/img/avatar.png"
    const customerName = document.createElement("p");
    customerName.className = "my-auto";
    customerName.innerText = this.name;

    // Customer avatar placeholder
    const avatar = document.createElement("img");
    avatar.src = "/web/includes/img/avatar.png"
    avatar.className = "rounded-full w-8 h-8 border"

    customerContainer.append(avatar, customerName);
    customerData.append(customerContainer);

    // Event id
    const eventData = document.createElement("td");
    eventData.innerText = this.eventId;

    // Category
    const categoryData = document.createElement("td");
    categoryData.innerText = this.category;

    // Number of tickets
    const ticketCountData = document.createElement("td");
    ticketCountData.innerText = `x${this.tickets}`;

    // Subtotal
    const chargeData = document.createElement("td");
    chargeData.innerText = `Rs ${this.charge}`;

    tr.append(dateData, customerData, eventData, categoryData, ticketCountData, chargeData);
    parent.append(tr);
  }

}