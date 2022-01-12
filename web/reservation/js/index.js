import { Venue, Section } from "../../includes/js/view/venue.view.js";
import { data } from "../js/mocks/vip.js";

const parent = document.getElementById("reservation");

const venue = new Venue(parent);

const stage = new Section("stage", 350, 100);
const vip = new Section("vip", 600, 250);
const premium = new Section("premium", 750, 300);
const regular = new Section("regular", 850, 300);

venue.render();
venue.container.classList.add("flex-1");

stage.render(venue.container, "STAGE");

vip.render(venue.container);
vip.getAvailability(data);
vip.populateSeats();

premium.render(venue.container);
premium.populateSeats();

regular.render(venue.container);
regular.populateSeats();
