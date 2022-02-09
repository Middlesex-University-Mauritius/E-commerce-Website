export class Booking {
  date = null;
  eventName = null;
  id = null;
  category = null;
  tickets = null;
  charge = null;

  constructor(date, eventName, id, category, tickets, charge) {
    this.date = date;
    this.eventName = eventName;
    this.id = id;
    this.category = category;
    this.tickets = tickets;
    this.charge = charge;
  }

  render(parent) {
    const tr = document.createElement("tr");
    const dateData = document.createElement("td");
    const eventNameData = document.createElement("td");
    const idData = document.createElement("td");
    const categoryData = document.createElement("td");
    const ticketsData = document.createElement("td");
    const chargeData = document.createElement("td");

    // Event Id
    const link = document.createElement("a");
    link.href = `/web/details/?id=${this.id}`;
    link.innerText = this.id;
    link.className = "text-blue-600 hover:underline";
    idData.append(link);

    // Event name
    eventNameData.innerText = this.eventName;

    // Category
    categoryData.innerText = this.category;

    // Tickets
    ticketsData.innerText = `x${this.tickets}`;

    // Date
    dateData.innerText = this.date;

    // Charge
    chargeData.innerText = `Rs ${this.charge}`;

    tr.append(
      idData,
      eventNameData,
      categoryData,
      ticketsData,
      dateData,
      chargeData
    );

    parent.append(tr);
  }
}
