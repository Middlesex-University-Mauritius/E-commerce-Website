"use strict"

import { setCookie, getCookie } from "../cookie.js"

export const RECENTLY_VISITED = "RECENTLY_VISITED";
export const SEARCH_TERM_RESULTS = "SEARCH_TERM_RESULTS";

export const setRecentlyVisited = (event_id = null) => {
  if (!event_id) return;

  let recentlyVisited = getCookie(RECENTLY_VISITED) || {};
  if (Reflect.has(recentlyVisited, event_id)) {
    if (recentlyVisited[event_id] >= 20) {
      recentlyVisited[event_id] = 1
    } else {
      recentlyVisited[event_id] = recentlyVisited[event_id] + 1;
    }
  } else {
    recentlyVisited[event_id] = 1
  }
  setCookie(RECENTLY_VISITED, recentlyVisited)
}

export const collectSearchTermResults = (events) => {
  let searchTermResults = getCookie(SEARCH_TERM_RESULTS) || {};

  events.forEach((event) => {
    event.tags.forEach((tag) => {
      if (Reflect.has(searchTermResults, tag)) {
        if (searchTermResults[tag] >= 20) {
          searchTermResults[tag] = 1;
        } else {
          searchTermResults[tag] = searchTermResults[tag] + 1;
        }
      } else {
        searchTermResults[tag] = 1;
      }
    })
  })

  setCookie(SEARCH_TERM_RESULTS, searchTermResults)
}