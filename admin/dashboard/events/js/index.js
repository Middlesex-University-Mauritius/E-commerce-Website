import { Event } from "../../../includes/view/event.view.js";

const parent = document.getElementById("event-data");

window.onload = () => {
  axios
    .get("/web/includes/controllers/eventsByCategory.controller.php")
    .then((response) => {
      const events = response.data;
      events.forEach((item) => {
        const { category, date, description, prices, tags, time, title } = item;
        const event = new Event(title, description, prices, 0, tags);
        event.render(parent);
      });
    });
};
