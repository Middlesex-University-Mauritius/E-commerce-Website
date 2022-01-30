class Customer {
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
    const customerContainer = document.createElement("div")
    customerContainer.className = "flex space-x-3";
    const customerImage = document.createElement("img");
    customerImage.className = "rounded-full w-8 h-8 border"
    customerImage.src = "/web/includes/img/avatar.png"
    const customerName = document.createElement("p");
    customerName.className = "my-auto";
    customerName.innerText = this.name;
    customerData.append(customerContainer);

    const eventData = document.createElement("td");
    eventData.innerText = this.eventId;

    const categoryData = document.createElement("td");
    categoryData.innerText = this.category;

    const ticketCountData = document.createElement("td");
    ticketCountData.innerText = this.tickets;

    const chargeData = document.createElement("td");
    chargeData.innerText = this.charge;

    tr.append(dateData, customerData, eventData, categoryData, ticketCountData, chargeData);
    parent.append(tr);
  }

}