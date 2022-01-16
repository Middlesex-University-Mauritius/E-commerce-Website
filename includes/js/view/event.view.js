export class Event {
  id = null;
  title = null;
  description = null;
  date = null;
  time = null;

  constructor(id, title, description, date, time) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.date = date;
    this.time = time;
  }

  render(parent) {

    const card = document.createElement("div");
    card.className = "bg-white border flex p-4 space-x-4 rounded";

    const content = document.createElement("div");
    content.className = "flex-1 space-y-4"

    const title = document.createElement("p");
    title.className = "text-md font-semibold"
    title.innerText = this.title;

    const description = document.createElement("p");
    description.className = "text-gray-800";
    description.innerText = this.description;

    const informationContainer = document.createElement("div");
    informationContainer.className = "flex space-x-6";

    const dateContainer = document.createElement("div");
    dateContainer.className = "flex space-x-1";

    const dateIcon = document.createElement("i");
    dateIcon.className = "far fa-calendar-alt text-xl block";

    const timeContainer = document.createElement("div");
    timeContainer.className = "flex space-x-1";

    const timeIcon = document.createElement("i");
    timeIcon.className = "far fa-clock text-xl block"

    const date = document.createElement("p");
    date.className = "my-auto text-sm";
    date.innerText = this.date;

    const time = document.createElement("p");
    time.className = "my-auto text-sm";
    time.innerText = this.time;

    const buttonContainer = document.createElement("div");
    buttonContainer.className = "my-auto flex-none w-30";

    const button = document.createElement("button");
    button.className = "primary"
    const link = document.createElement("a");
    link.className = "block py-2 px-4";
    link.innerText = "See Tickets"
    link.href = `/web/reservation?id=${this.id}`;
    button.append(link);

    dateContainer.append(dateIcon, date)
    timeContainer.append(timeIcon, time)
    informationContainer.append(dateContainer, timeContainer);
    buttonContainer.append(button);
    content.append(title, description, informationContainer)
    card.append(content, buttonContainer)

    parent.append(card);

  }

}