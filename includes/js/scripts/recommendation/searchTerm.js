"use strict"

import { getCookie } from "../cookie.js";
import { SEARCH_TERM_RESULTS } from "./tracker.js";
import { Event } from "../../view/event.view.js";

const parent = document.getElementById("search-term");

const SHRINKED = true;
const searchTermResults = getCookie(SEARCH_TERM_RESULTS);

let formattedSearchTermResults = {};

Object.keys(searchTermResults).map((tag) => {
  if (searchTermResults[tag] >= 1) {
    formattedSearchTermResults[tag] = searchTermResults[tag];
  }
})

const result = Object
 .entries(formattedSearchTermResults)
 .sort((a, b) => b[1] - a[1])
 .reduce((_sortedObj, [k,v]) => ({
   ..._sortedObj, 
   [k]: v
 }), {})

const response = await axios.post("/web/includes/controllers/search-term-results.controller.php", {
  tags: Object.keys(result)
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