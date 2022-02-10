"use strict"

import { getCookie } from "../../includes/js/scripts/cookie.js";
import { RECENTLY_VISITED } from "../../includes/js/scripts/recommendation.js";
import { Event } from "../../includes/js/view/event.view.js";

const parent = document.getElementById("recently-visited");

const SHRINKED = true;
const recentlyVisited = getCookie(RECENTLY_VISITED);
const response = await axios.get("/web/includes/controllers/recently-visited.controller.php", {
  params: {
    ids: JSON.stringify(Object.keys(recentlyVisited))
  }
});
const events = response.data;
console.log("events", events)

events.map((row) => {
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
  event.render(parent);
})