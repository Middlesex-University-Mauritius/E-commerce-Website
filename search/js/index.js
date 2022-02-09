import { Event } from "../../includes/js/view/event.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const events = document.getElementById("events");

window.onload = async () => {
  const SHRINKED = true;

  axios
    .get("/web/includes/controllers/search-event.controller.php", {
      params: {
        query: params.query,
      },
    })
    .then((response) => {
      response.data.map((row) => {
        const {
          _id: { $oid },
          title,
          description,
          date,
          time,
          images,
          datePosted,
          prices
        } = row;

        const event = new Event(
          SHRINKED,
          $oid,
          title,
          description,
          date,
          time,
          images,
          datePosted,
          prices
        );
        event.render(events);
      });
    });
};
