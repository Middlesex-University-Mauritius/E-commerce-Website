/**
 * file: cartItem.view.js
 * description: Checkout cart item view
 */

import { formatNumber } from "../../../includes/js/scripts/core.js";

export class CartItem {
  title = null;
  tickets = null;
  subtotal = null;
  id = null;

  constructor(id, title, tickets, subtotal) {
    this.id = id;
    this.title = title;
    this.tickets = tickets;
    this.subtotal = subtotal;
  }

  render(parent) {
    const container = document.createElement("div");
    const content = document.createElement("div");

    const icon = document.createElement("i");
    icon.setAttribute("data-modal-toggle", "defaultModal");
    icon.addEventListener("click", () => {
      window.itemToDelete = this.id;
    });

    const updateButton = document.createElement("a");
    updateButton.innerText = "Update";
    updateButton.href = `/web/reservation/?id=${this.id}`;
    updateButton.className =
      "p-2 mr-3 text-blue-600 underline hover:text-blue-800";

    const title = document.createElement("p");
    const tickets = document.createElement("p");
    const subtotal = document.createElement("p");

    title.innerText = this.title;
    tickets.innerText = `x${this.tickets} tickets`;
    subtotal.innerText = `Rs ${formatNumber(this.subtotal)}`;

    const controller = document.createElement("div");
    controller.className = "my-auto";

    controller.append(updateButton, icon);

    content.append(title, tickets, subtotal);

    container.append(content, controller);

    parent.append(container);

    container.className =
      "flex justify-between border-b py-4 last:border-b-0 fade";
    content.className = "space-y-2";
    title.className = "text-md font-semibold";
    subtotal.className = "text-green-700";
    icon.className =
      "far fa-trash-alt bg-blue-50 p-3 rounded-full hover:bg-blue-100 cursor-pointer text-gray-600 hover:text-gray-800";
  }
}
