import { Section, Venue } from "../../includes/js/view/venue.view.js";

const RATIO = 2;
const DISABLED = true;

const parent = document.getElementById("card-venue");

// Reduce the size of the preview venue by 2 using ratio parameter and disabling mouse events
const venue = new Venue(parent, RATIO, DISABLED);

// Show stage, vip, premium and regular
const stage = new Section(venue, "stage", 350, 100);
const vip = new Section(venue, "vip", 600, 250);
const premium = new Section(venue, "premium", 750, 300);
const regular = new Section(venue, "regular", 850, 300);

venue.render();

stage.render(venue.container, "STAGE");

vip.render(venue.container);
premium.render(venue.container);
regular.render(venue.container);

// Populate sections with seats
vip.populateSeats();
premium.populateSeats();
regular.populateSeats();