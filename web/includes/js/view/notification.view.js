class Notification {

  parent = null;

  constructor(parent) {
    this.parent = parent;
  }

  render(message, type="error") {
    const parent = this.parent;
    const notification = document.createElement("p");
    notification.innerHTML = message;
    notification.id = "notification";
    notification.classList.add(type)

    notification.onclick = function() {
      parent.removeChild(this);
    }

    if (this.parent.querySelector("#notification")) {
      try {
        this.parent.removeChild(notification)
      } catch {
        return
      }
    } else {
      this.parent.append(notification)
      setTimeout(() => {
        this.parent.removeChild(notification)
      }, 5000)
    }

  }

}

export default Notification;