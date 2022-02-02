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
  image = null;

  constructor(shrinked, id, title, description, date, time, image) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.date = date;
    this.time = time;
    this.shrinked = shrinked;
    this.image = image;
  }

  // Cards are displayed in shrinked mode by default
  render(parent) {
    const card = document.createElement("div");
    card.className = "events-card bg-white border flex p-4 space-x-4 rounded";
    if (this.shrinked) card.classList.add("shrinked");

    const image = document.createElement("img");
    image.src = this.image;
    if (!this.shrinked) {
      image.className = "w-40 h-32 object-cover";
    }
    image.classList.add("event-img");

    const content = document.createElement("div");
    content.className = "flex-1 space-y-4 event-content";

    const title = document.createElement("a");
    title.className =
      "text-blue-500 text-md font-medium event-title hover:font-blue-700 hover:underline";
    title.innerText = this.title;
    title.href = `/web/details?id=${this.id}`;

    const description = document.createElement("p");
    description.className = "text-gray-700 event-description";
    description.innerText =
      this.description.length >= 120
        ? this.description.substring(0, 120) + "..."
        : this.description;

    const informationContainer = document.createElement("div");
    informationContainer.className =
      "flex space-x-6 event-information-container";

    const dateContainer = document.createElement("div");
    dateContainer.className = "flex space-x-1 event-date-container";

    const dateIcon = document.createElement("i");
    dateIcon.className = "far fa-calendar-alt text-xl block event-date-icon";

    const timeContainer = document.createElement("div");
    timeContainer.className = "flex space-x-1 event-time-container";

    const timeIcon = document.createElement("i");
    timeIcon.className = "far fa-clock text-xl block";

    const date = document.createElement("p");
    date.className = "my-auto text-sm event-date";
    date.innerText = this.date;

    const time = document.createElement("p");
    time.className = "my-auto text-sm event-time";
    time.innerText = this.time;

    const buttonContainer = document.createElement("div");
    buttonContainer.className = "my-auto flex-none w-30 event-button-container";

    const button = document.createElement("button");
    button.className = "primary event-button";
    const link = document.createElement("a");
    link.className = "block py-2 px-4";
    link.innerText = "See Tickets";
    link.href = `/web/reservation?id=${this.id}`;
    button.append(link);

    dateContainer.append(dateIcon, date);
    timeContainer.append(timeIcon, time);
    informationContainer.append(dateContainer, timeContainer);
    buttonContainer.append(button);
    content.append(title, description, informationContainer);
    card.append(image, content, buttonContainer);

    parent.append(card);
  }
}
