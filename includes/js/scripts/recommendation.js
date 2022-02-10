import { setCookie, getCookie } from "./cookie.js"

export const RECENTLY_VISITED = "RECENTLY_VISITED";

export const setRecentlyVisited = (event_id = null) => {
  if (!event_id) return;

  let recentlyVisited = getCookie(RECENTLY_VISITED) || {};
  if (recentlyVisited[event_id]) {
    recentlyVisited[event_id] = recentlyVisited[event_id] + 1;
  } else {
    recentlyVisited[event_id] = 1
  }
  setCookie(RECENTLY_VISITED, recentlyVisited)
}