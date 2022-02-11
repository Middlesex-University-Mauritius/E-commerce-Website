/**
 * file: notification.view.js
 * description: Show a popup notification
 */

class Notification {
  parent = null;

  constructor(parent) {
    this.parent = parent;
  }

  render(message, type = "error") {
    const parent = this.parent;
    const notification = document.createElement("p");
    notification.innerHTML = message;
    notification.id = "notification";
    notification.className = "fade";
    notification.classList.add(type);

    notification.onclick = function () {
      parent.removeChild(this);
    };

    // Clear the notification after 5 seconds
    if (this.parent.querySelector("#notification")) {
      try {
        this.parent.removeChild(notification);
      } catch {
        return;
      }
    } else {
      this.parent.append(notification);
      setTimeout(() => {
        notification.style.position = "absolute";
        notification.style.top = "-9999999px";
        // this.parent.removeChild(notification);
      }, 5000);
    }
  }
}

export default Notification;
