import { Venue, Section } from "../../includes/js/view/venue.view.js";

const parent = document.getElementById("reservation");

const venue = new Venue(parent);

const stage = new Section(venue, "stage", 350, 100);
const vip = new Section(venue, "vip", 600, 250);
const premium = new Section(venue, "premium", 750, 300);
const regular = new Section(venue, "regular", 850, 300);

venue.render();
venue.container.classList.add("flex-1");

stage.render(venue.container, "STAGE");

vip.render(venue.container);
premium.render(venue.container);
regular.render(venue.container);

window.onload = async () => {
  const response = await axios.get("./api/bookings.php")
  vip.getAvailability(response.data);
  vip.populateSeats();

  premium.populateSeats();
  regular.populateSeats();
}

const cartButton = document.getElementById("cart-button");

cartButton.addEventListener("click", () => {
  console.log(venue.getSubtotal())
  console.log(venue.getSelections())
})