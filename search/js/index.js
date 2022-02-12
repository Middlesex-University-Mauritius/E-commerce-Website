import { Event } from "../../includes/js/view/event.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

// Events placeholder
const events = document.getElementById("events");

// Page query
const query = document.getElementById("query");
query.innerText = `results for "${params.query}"`

const SORT_OPTIONS = {
  "date-newest": {
    field: "date",
    order: -1
  },
  "date-oldest": {
    field: "date",
    order: 1
  },
  "price-low-high": {
    field: "averagePrice",
    order: 1
  },
  "price-high-low": {
    field: "averagePrice",
    order: -1
  },
}

// Fetch data
const fetchData = async (options = { field: "date", order: -1 }) => {
  const SHRINKED = true;
  events.innerHTML = null;

  const api = "/web/includes/controllers/search-event.controller.php"

  const response = await axios.get(api, {
    params: {
      query: params.query,
      field: options.field,
      order: JSON.stringify(options.order)
    }
  });
  console.log(response.data);
  response.data.map((row) => {
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
    event.render(events);
  });

}

window.onload = async () => {
  fetchData();
};

// Sort options
const sortOptions = document.getElementById("sort-options");

sortOptions.addEventListener("change", (event) => {
  const sortOption = event.target.value;
  fetchData({
    field: SORT_OPTIONS[sortOption].field,
    order: SORT_OPTIONS[sortOption].order
  })
})