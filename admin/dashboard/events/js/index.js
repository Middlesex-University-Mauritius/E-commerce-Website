import { Event } from "../../../includes/view/event.view.js";

const parent = document.getElementById("event-data");

window.onload = () => {
  axios
    .get("/web/includes/controllers/events-by-category.controller.php")
    .then((response) => {
      const events = response.data;
      events.forEach((item) => {
        const {
          _id: { $oid: event_id },
          description,
          prices,
          tags,
          title,
          images,
          bookings
        } = item;
        const event = new Event(event_id, title, description, prices, bookings.length, tags, images);
        event.render(parent);
      });
    });
};
