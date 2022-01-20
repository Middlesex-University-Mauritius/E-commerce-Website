/**
 * file: storage.view.js
 * description: Local storage helper class to get and set items
 */

export class Storage {
  storage = null;
  path = null;

  // Initialize storage with a default state, eg {}, [], 100, 0
  constructor(path, defaultState) {
    this.path = path;
    this.storage = localStorage.getItem(path) ? JSON.parse(localStorage.getItem(path)) : defaultState;
  }

  // Retrieve an item from the localstorage
  get() {
    return this.storage;
  }

  // Update storage
  set(data) {
    localStorage.setItem(this.path, JSON.stringify(data))
  }
}