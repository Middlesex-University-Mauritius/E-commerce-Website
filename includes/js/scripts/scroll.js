const search = document.getElementById("navbar-search-box");
const nav = document.getElementById("nav");

nav.style.background = "none";
search.style.top = "-77px";
search.style.opacity = "0%";

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  search.style.position = "relative";
  search.style.transition = "opacity 0.3s";

  if (
    document.body.scrollTop > 240 ||
    document.documentElement.scrollTop > 240
  ) {
    search.style.top = "0px";
    search.style.opacity = "100%";
    nav.style.background = "#0a1626";
  } else {
    search.style.top = "-77px";
    search.style.opacity = "0%";
    nav.style.background = "none";
  }
}
