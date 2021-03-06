import { Event } from "../../../includes/view/event.view.js";

const eventTable = document.getElementById("event-table");
const eventData = document.getElementById("event-data");

window.onload = async () => {
  const api = "/web/includes/controllers/events-by-category.controller.php";
  const response = await axios.get(api);

  const events = response.data;

  // No events. show create button button
  if (!events || events.length === 0) {
    eventTable.innerHTML = null;
    const link = document.createElement("a");
    link.href = "/web/admin/dashboard/add%20event/add%20event.php";
    const createEventButton = document.createElement("button");
    createEventButton.className = "primary px-4 py-2 mt-4";
    createEventButton.innerText = "Create event";
    link.append(createEventButton);
    const emptyMessage = document.createElement("p");
    emptyMessage.innerText = "You don't have any events yet";
    eventTable.append(emptyMessage);
    eventTable.append(link);
    return;
  }

  // Render events
  events.forEach((item) => {
    const {
      _id: { $oid: event_id },
      description,
      prices,
      tags,
      title,
      images,
      bookings,
      promoted,
    } = item;

    let total = 0;
    if (bookings.length > 0)
      bookings.map((booking) => (total += Object.keys(booking.seats).length));

    const event = new Event(
      event_id,
      title,
      description,
      prices,
      total,
      tags,
      images,
      promoted
    );
    event.render(eventData);
  });
};
