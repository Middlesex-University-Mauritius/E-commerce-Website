export class Booking {
  date = null;
  name = null;
  address = null;
  category = null;
  tickets = null;
  charge = null;

  constructor(date, name, address, category, tickets, charge) {
    this.date = date;
    this.name = name;
    this.address = address;
    this.category = category;
    this.tickets = tickets;
    this.charge = charge;
  }

  render(parent) {

    const tr = document.createElement("tr");
    const dateData = document.createElement("td");
    const customerData = document.createElement("td");

    // Timestamp 
    dateData.innerHTML = `
    <span class="inline-flex items-center">
      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
      ${moment(Number(this.date)).fromNow()}
    </span>
    `

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

    // Address
    const addressData = document.createElement("td");
    addressData.innerText = this.address;

    // Category
    const categoryData = document.createElement("td");
    const category = document.createElement("span");

    if (this.category === "live-music")
      category.className = "bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "stand-up")
      category.className = "bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"
    else if (this.category === "arts-and-theater")
      category.className = "bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded"

    category.innerText = this.category;
    categoryData.append(category)

    // Number of tickets
    const ticketCountData = document.createElement("td");
    ticketCountData.innerText = `x${this.tickets}`;

    // Subtotal
    const chargeData = document.createElement("td");
    chargeData.innerText = `Rs ${this.charge}`;

    tr.append(dateData, customerData, addressData, categoryData, ticketCountData, chargeData);
    parent.append(tr);
  }

}