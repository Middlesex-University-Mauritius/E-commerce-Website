const search = document.getElementById("search-box");
const input = document.getElementById("search-input");

search.addEventListener("submit", (event) => {
  event.preventDefault();
  window.location.href = `/web/search?query=${input.value}`;
});
