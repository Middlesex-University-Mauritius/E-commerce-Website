import { Section, Venue } from "../../includes/js/view/venue.view.js";

const parent = document.getElementById("card-venue");

const venue = new Venue(parent, 2, true);

const stage = new Section(venue, "stage", 350, 100);
const vip = new Section(venue, "vip", 600, 250);
const premium = new Section(venue, "premium", 750, 300);
const regular = new Section(venue, "regular", 850, 300);

venue.render();

stage.render(venue.container, "STAGE");

vip.render(venue.container);
premium.render(venue.container);
regular.render(venue.container);

vip.populateSeats();
premium.populateSeats();
regular.populateSeats();

console.log("hello World")