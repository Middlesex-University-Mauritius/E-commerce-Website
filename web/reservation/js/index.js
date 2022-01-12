import { Venue, Section } from "../../includes/js/view/venue.view.js";

const parent = document.getElementById("reservation");

const venue = new Venue(parent);

const vip = new Section("vip", 600, 250);
const premium = new Section("premium", 750, 300);
const regular = new Section("regular", 850, 300);

venue.render();
venue.container.classList.add("flex-1")

vip.render(venue.container);
vip.populateSeats();

premium.render(venue.container);
premium.populateSeats();

regular.render(venue.container);
regular.populateSeats();

let tab = "seats";

const seatsTab = document.getElementById("seats");
const ticketsTab = document.getElementById("tickets");

seatsTab.addEventListener("click", () => {
  tab = seatsTab.id
  seatsTab.className = "tab active"
  ticketsTab.className = "tab"
});

ticketsTab.addEventListener("click", () => {
  tab = ticketsTab.id
  ticketsTab.className = "tab active"
  seatsTab.className = "tab"
});
