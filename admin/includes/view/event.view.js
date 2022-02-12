"use strict"

import Notification from "../../../includes/js/view/notification.view.js";

export class Event {
  event_id = null;
  title = null;
  description = null;
  prices = null;
  bookings = null;
  tags = null;
  images = null;
  promoted = null;

  constructor(event_id, title, description, prices, bookings, tags, images, promoted=false) {
    this.event_id = event_id;
    this.title = title;
    this.description = description;
    this.prices = prices;
    this.bookings = bookings;
    this.tags = tags;
    this.images = images;
    this.promoted = promoted;
  }

  render(parent) {
    const tr = document.createElement("tr");
    const productData = document.createElement("td");
    const priceData = document.createElement("td");
    const bookingsData = document.createElement("td");
    const promotedData = document.createElement("td");
    const editData = document.createElement("td");

    priceData.className = "whitespace-nowrap";

    const productContainer = document.createElement("div");
    productContainer.className =
      "flex space-x-4 h-40 md:max-w-[450px] lg:max-w-[800px]";

    const image = document.createElement("img");
    image.className = "h-40 w-40 rounded object-cover";
    image.src = `/web/__images__/${this.event_id}/${this.images[0]}`;

    const productContent = document.createElement("div");
    productContent.className = "space-y-3";

    const descriptionContainer = document.createElement("div");
    const title = document.createElement("p");
    title.className = "font-bold";
    title.innerText = this.title;

    const description = document.createElement("p");
    description.innerText =
      this.description.length >= 190
        ? this.description.substring(0, 190) + "..."
        : this.description;

    descriptionContainer.append(title, description);

    const tagsContainer = document.createElement("div");
    tagsContainer.className = "flex space-x-2";
    this.tags.forEach((t) => {
      const tag = document.createElement("a");
      tag.className = "tag";
      tag.href = "#";
      tag.innerText = t;
      tagsContainer.append(tag);
    });

    priceData.innerText = `Rs ${this.prices.regular} - ${this.prices.vip}`;

    const bookingsContainer = document.createElement("div");
    bookingsContainer.className = "flex space-x-2";
    const icon = document.createElement("i");
    icon.className = "fas fa-users text-lg";

    const count = document.createElement("p");
    count.className = "my-auto";
    count.innerText = this.bookings;

    const editUrl = document.createElement("a");
    editUrl.href = `/web/admin/dashboard/edit-event?id=${this.event_id}`
    const button = document.createElement("button");
    button.className = "edit py-2 px-4 whitespace-nowrap";
    button.innerText = "Edit Event";
    editUrl.append(button);
    editData.append(editUrl);

    bookingsContainer.append(icon, count);

    productContent.append(descriptionContainer, tagsContainer);
    productContainer.append(image, productContent);

    productData.append(productContainer);
    bookingsData.append(bookingsContainer);

    const switchParent = document.createElement("div");
    switchParent.className = "my-auto block"
    const switchContainer = document.createElement("label");
    switchContainer.className = "flex relative items-center cursor-pointer";
    switchContainer.setAttribute("for", `toggle-${this.event_id}`);
    const switchInput = document.createElement("input");
    switchInput.type = "checkbox";
    switchInput.id = `toggle-${this.event_id}`;
    switchInput.className = "sr-only";
    switchInput.checked = this.promoted;
    const switchPlaceholder = document.createElement("div");
    switchPlaceholder.className = "w-11 h-6 bg-gray-300 rounded-full border border-gray-300 toggle-bg";

    switchInput.addEventListener("change", async (event) => {
      const response = await axios.post("/web/admin/includes/controllers/promote-event.controller.php", {
        id: this.event_id,
        status: event.target.checked 
      })
      const notification = new Notification(document.querySelector("#body"));
      if (response.data.success) {
        if (event.target.checked ) notification.render("Event promoted successfully", "success");
      } else {
        notification.render("Something went wrong");
      }
    })

    switchContainer.append(switchInput, switchPlaceholder)
    switchParent.append(switchContainer);
    promotedData.append(switchParent)

    tr.append(productData, priceData, bookingsData, promotedData, editData);

    parent.append(tr);
  }
}
