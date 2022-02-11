export class Booking {
  id = null;
  date = null;
  eventName = null;
  category = null;
  tickets = null;
  charge = null;

  constructor(id, date, eventName, category, tickets, charge) {
    this.id = id;
    this.date = date;
    this.eventName = eventName;
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
    link.href = `/web/reservation/?id=${this.id}`;
    link.innerText = this.id;
    link.className = "text-blue-600 hover:underline";
    idData.append(link);

    // Event name
    eventNameData.innerText = this.eventName;

    // Category
    const category = document.createElement("span");

    if (this.category === "live-music")
      category.className = "bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "stand-up")
      category.className = "bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "arts-and-theater")
      category.className = "bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"

    category.innerText = this.category;
    categoryData.append(category)

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
