export class CartItem {

  title = null;
  tickets = null;
  subtotal = null;

  constructor(title, tickets, subtotal) {
    this.title = title;
    this.tickets = tickets;
    this.subtotal = subtotal;
  }

  render(parent) {

    const container = document.createElement("div");
    const content = document.createElement("div");

    const icon = document.createElement("i");

    const title = document.createElement("p");
    const tickets = document.createElement("p");
    const subtotal = document.createElement("p");

    title.innerText = this.title;
    tickets.innerText = `x${this.tickets} tickets`;
    subtotal.innerText = `Rs ${this.subtotal}`;

    content.append(title, tickets, subtotal);

    container.append(content, icon);

    parent.append(container);

    container.className = "flex justify-between";
    content.className = "space-y-2"
    title.className = "text-md font-semibold"
    subtotal.className = "text-green-700";
    icon.className = "far fa-trash-alt my-auto bg-blue-50 p-3 rounded-full hover:bg-blue-100 cursor-pointer text-gray-600 hover:text-gray-800"

  }

}