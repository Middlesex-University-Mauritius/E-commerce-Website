"use strict";

/**
 * file: message.view.js
 * description: Show a message box in authentication, etc...
 */

class Message {
  message = null;

  constructor(message) {
    this.message = message;
  }

  render(parent, type = "error") {
    const msg = document.createElement("p");
    msg.className = type;
    msg.innerText = this.message;
    parent.appendChild(msg);
  }
}

export default Message;
