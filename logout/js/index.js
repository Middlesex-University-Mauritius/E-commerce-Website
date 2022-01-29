import { Storage } from "../../includes/js/scripts/storage.js";

window.onload = function() {
  const storage = new Storage("user", {})
  storage.delete();
  window.location.href = "/web/home"
}