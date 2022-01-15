export class Storage {
  storage = null;
  path = null;

  constructor(path, defaultState) {
    this.path = path;
    this.storage = localStorage.getItem(path) ? JSON.parse(localStorage.getItem(path)) : defaultState;
  }

  get() {
    return this.storage;
  }

  set(data) {
    localStorage.setItem(this.path, JSON.stringify(data))
  }
}