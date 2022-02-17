"use strict";

/**
 * description: Booking view
 */

export class Booking {
  id = null;
  date = null;
  title = null;
  description = null;

  constructor(id, date, title, description) {
    this.id = id;
    this.date = date;
    this.title = title;
    this.description = description;
  }

  render(parent) {
    const li = document.createElement("li");
    li.className = "mb-10 ml-4 fade";
    const timeline = document.createElement("div");
    timeline.className =
      "absolute w-3 h-3 bg-gray-200 rounded-full -left-1.5 border border-white white:border-gray-900 white:bg-gray-700";
    const time = document.createElement("time");
    time.className =
      "mb-1 text-sm font-normal leading-none text-gray-400 white:text-gray-500";
    const title = document.createElement("a");
    title.className =
      "text-lg font-semibold text-gray-900 white:text-white block hover:underline";
    title.href = `/web/details/?id=${this.id}`;
    const description = document.createElement("p");
    description.className =
      "mb-4 text-base font-normal text-gray-500 white:text-gray-400";

    time.innerText = this.date;
    title.innerText = this.title;
    description.innerText =
      this.description.length >= 120
        ? this.description.substring(0, 120) + "..."
        : this.description;

    li.append(timeline, time, title, description);
    parent.append(li);
  }
}
