"use strict"

import { getCookie } from "../cookie.js";
import { RECENTLY_VISITED } from "./tracker.js";
import { Event } from "../../view/event.view.js";

const parent = document.getElementById("recently-visited");

const SHRINKED = true;
const recentlyVisited = getCookie(RECENTLY_VISITED);

const result = Object
 .entries(recentlyVisited)
 .sort((a, b) => b[1] - a[1])
 .reduce((_sortedObj, [k,v]) => ({
   ..._sortedObj, 
   [k]: v
 }), {})

// Show 10 frequently visited events
const response = await axios.post("/web/includes/controllers/recently-visited.controller.php", {
  ids: Object.keys(result)
});

const events = response.data;

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