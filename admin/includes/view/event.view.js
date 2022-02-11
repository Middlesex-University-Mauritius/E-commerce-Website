export class Event {
  event_id = null;
  title = null;
  description = null;
  prices = null;
  bookings = null;
  tags = null;
  images = null;

  constructor(event_id, title, description, prices, bookings, tags, images) {
    this.event_id = event_id;
    this.title = title;
    this.description = description;
    this.prices = prices;
    this.bookings = bookings;
    this.tags = tags;
    this.images = images;
  }

  render(parent) {
    const tr = document.createElement("tr");
    const productData = document.createElement("td");
    const priceData = document.createElement("td");
    const bookingsData = document.createElement("td");
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

    tr.append(productData, priceData, bookingsData, editData);

    parent.append(tr);
  }
}
