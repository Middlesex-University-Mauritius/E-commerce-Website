const search = document.getElementById("navbar-search-box");
const input = document.getElementById("navbar-search-input");

search.addEventListener("submit", (event) => {
  event.preventDefault();
  window.location.href = `/web/search?query=${input.value}`;
});
