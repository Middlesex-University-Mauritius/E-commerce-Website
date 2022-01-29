export class Loader {

  parent = null;

  constructor(parent) {
    this.parent = parent;
  }

  set() {
    const i = document.createElement("i");
    i.className = "fas fa-spinner animate-spin"
    this.parent.append(i);
  }

  unset() {
    this.parent.innerHTML = null;
  }

}