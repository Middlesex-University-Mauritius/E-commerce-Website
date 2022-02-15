"use strict"

export class Error {
  render(parent, message) {
    const container = document.createElement("div");
    container.className = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg space-x-2 fade border border-red-200"
    container.innerText = message;

    parent.append(container);
  }
}
