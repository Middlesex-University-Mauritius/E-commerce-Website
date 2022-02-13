import { Storage } from "./storage.js";

// Get number of tickets in cart
export const ticketsCount = () => {
  const cart = new Storage("cart", {}).get();

  let count = 0;

  Object.keys(cart).map((id) => {
    count += Object.keys(cart[id].seats).length;
  });

  return count || 0;
};

// Get number of events in cart
export const eventsCount = () => {
  const cart = new Storage("cart", {}).get();

  return Object.keys(cart).length || 0;
};

// Format number
export const formatNumber = (number) => {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}