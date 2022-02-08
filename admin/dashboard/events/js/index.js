import { Event } from "../../../includes/view/event.view.js";

const parent = document.getElementById("event-data");

window.onload = () => {
  axios
    .get("/web/includes/controllers/events-by-category.controller.php")
    .then((response) => {

      console.log("event-response", response);
      const events = response.data;
      events.forEach((item) => {
        const {
          category,
          date,
          description,
          prices,
          tags,
          time,
          title,
          images,
        } = item;
        const event = new Event(title, description, prices, 0, tags, images);
        event.render(parent);
      });
    });
};
