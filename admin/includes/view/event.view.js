export class Event {
  title = null;
  description = null;
  prices = null;
  bookings = null;
  tags = null;
  image = null;

  constructor(title, description, prices, bookings, tags, image) {
    this.title = title;
    this.description = description;
    this.prices = prices;
    this.bookings = bookings;
    this.tags = tags;
    this.image = image;
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
    image.src = this.image;

    const productContent = document.createElement("div");
    productContent.className = "space-y-3";

    const descriptionContainer = document.createElement("div");
    const title = document.createElement("p");
    title.className = "font-bold";
    title.innerText = this.title;

    const description = document.createElement("p");
    description.innerText =
      this.description.length >= 220
        ? this.description.substring(0, 220) + "..."
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

    const button = document.createElement("button");
    button.className = "edit py-2 px-4 whitespace-nowrap";
    button.innerText = "Edit Product";

    bookingsContainer.append(icon, count);

    productContent.append(descriptionContainer, tagsContainer);
    productContainer.append(image, productContent);

    productData.append(productContainer);
    bookingsData.append(bookingsContainer);
    editData.append(button);

    tr.append(productData, priceData, bookingsData, editData);

    parent.append(tr);
  }
}
