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
      console.log("search", response.data);

      response.data.map((row) => {
        console.log(row);

        const {
          _id: { $oid },
          title,
          description,
          date,
          time,
          images,
        } = row;

        const event = new Event(
          SHRINKED,
          $oid,
          title,
          description,
          date,
          time,
          images
        );
        event.render(events);
      });
    });
};
