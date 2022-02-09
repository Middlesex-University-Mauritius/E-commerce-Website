/**
 * file: event.view.js
 * description: event card view
 */

export class Event {
  id = null;
  title = null;
  description = null;
  date = null;
  time = null;
  shrinked = false;
  images = null;
  datePosted = null;
  prices = null;

  constructor(
    shrinked,
    id,
    title,
    description,
    date,
    time,
    images,
    datePosted,
    prices
  ) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.date = date;
    this.time = time;
    this.shrinked = shrinked;
    this.images = images;
    this.datePosted = datePosted;
    this.prices = prices
  }

  isToday(comparedDate) {
    const today = (date) =>
      kmoment(Date(comparedDate), "HH").diff(date, "days") == 0;
    return today;
  }

  // Cards are displayed in shrinked mode by default
  render(parent) {
    // Overview of card component
    const containers = {
      card: document.createElement("div"),
      body: {
        parent: document.createElement("div"),
        description: {
          parent: document.createElement("div"),
        },
        price: {
          parent: document.createElement("div"),
          numbers: document.createElement("div"),
        },
      },
      calendar: {
        parent: document.createElement("div"),
        date: document.createElement("div"),
        time: document.createElement("div"),
        icons: {
          date: document.createElement("i"),
          time: document.createElement("i"),
        },
      },
    };

    // Parent card
    containers.card.className =
      "bg-white rounded-lg border border-gray-200 shadow-md fade";

    if (!this.shrinked) containers.card.classList.add("flex");

    const bodyParent = document.createElement("div");

    // Card image
    const image = document.createElement("img");
    image.src = this.images[0];
    image.className =
      "rounded-t-md border border-gray-200 w-full h-56 object-cover";

    if (!this.shrinked) {
      image.className =
        "rounded-l-md border border-gray-200 w-56 min-h-max object-cover";
    }

    // Body
    containers.body.parent.className = "px-6 py-4 border-b";
    containers.body.description.parent.className = "space-y-1";
    containers.body.price.className = "flex space-x-1";

    if (this.shrinked) containers.body.description.parent.classList.add("mb-5");

    // Title
    const titleContainer = document.createElement("div");
    titleContainer.className = "space-x-2"

    const title = document.createElement("a");
    title.href = `/web/details?id=${this.id}`;
    title.className = "text-blue-600 text-md font-medium event-title hover:font-blue-700 hover:underline";
    title.innerText = this.title;

    titleContainer.append(title);

    const tag = document.createElement("span");
    tag.className =
      "bg-green-200 max-w-min text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded my-auto";
    tag.innerText = "NEW";

    if (this.isToday(Date(this.datePosted))) {
      titleContainer.append(tag);
    }

    if (!this.shrinked) {
      titleContainer.classList.add("mb-4");
    }

    // Description
    const description = document.createElement("p");
    description.className = "text-gray-700";
    description.innerText =
      this.description.length >= 190
        ? this.description.substring(0, 190) + "..."
        : this.description;

    containers.body.price.parent.className = "flex space-x-1";

    // Pricing
    const currency = document.createElement("span");
    currency.innerText = "Rs";
    const from = document.createElement("span");
    from.innerText = this.prices.regular;
    from.className = "text-xl font-semibold text-gray-700";
    const range = document.createElement("span");
    range.innerText = "-";
    const to = document.createElement("span");
    to.innerText = this.prices.vip;
    to.className = "text-xl font-semibold text-gray-700";

    // Append price
    containers.body.price.numbers.append(from, range, to);
    containers.body.price.parent.append(
      currency,
      containers.body.price.numbers
    );

    // Append titleContainer, description
    containers.body.description.parent.append(titleContainer);

    if (this.shrinked) containers.body.description.parent.append(description);

    // Append (titleContainer, description) and Price
    containers.body.parent.append(
      containers.body.description.parent,
      containers.body.price.parent
    );

    const calendarParent = document.createElement("div");

    // Calendar
    containers.calendar.date.className = "flex space-x-2";
    containers.calendar.time.className = "flex space-x-2";

    containers.calendar.icons.date.className = "far fa-calendar-alt my-auto";
    containers.calendar.icons.time.className = "far fa-clock my-auto";

    const date = document.createElement("span");
    date.innerText = this.date;
    date.className = "my-auto";

    const time = document.createElement("span");
    time.innerText = this.time;
    time.className = "my-auto";

    containers.calendar.date.append(containers.calendar.icons.date, date);
    containers.calendar.time.append(containers.calendar.icons.time, time);

    containers.calendar.parent.className = "space-y-3 text-gray-700";
    containers.calendar.parent.append(
      containers.calendar.date,
      containers.calendar.time
    );

    if (!this.shrinked) {
      containers.calendar.parent.classList.add("px-6");
      containers.calendar.parent.classList.add("py-4");
    }

    const buttonLink = document.createElement("a");
    buttonLink.href = `/web/details?id=${this.id}`;
    buttonLink.className = "my-auto mr-5";

    const button = document.createElement("button");
    button.className = "px-5 py-2 primary";
    button.innerText = "View Details";

    if (this.shrinked) button.className = "px-5 py-2 primary w-full mt-4";

    calendarParent.className = "px-6 py-4";

    buttonLink.append(button);

    calendarParent.append(containers.calendar.parent);

    calendarParent.append(buttonLink);

    if (!this.shrinked) {
      calendarParent.className = "flex justify-between";
      bodyParent.classList.add("w-full");
    }

    bodyParent.append(containers.body.parent, calendarParent);

    containers.card.append(image, bodyParent);
    parent.append(containers.card);
  }
}