const vip     = document.getElementById("vip")
const premium = document.getElementById("premium")
const regular = document.getElementById("regular")

const SEAT_SIZE = 50;
const SEAT_SPACING = 23;

function populateBlocks(element, blockWidth, blockHeight) {
  for (let i=0; i<=blockWidth-SEAT_SIZE; i+=SEAT_SIZE) {
    for (let j=0; j<=blockHeight-SEAT_SIZE; j+=SEAT_SIZE) {
      const parent = document.createElement("div");
      parent.className = "seat-parent";
      parent.style.position = "absolute";
      parent.style.top = j + "px";
      parent.style.left = i + "px";
      parent.style.height = SEAT_SIZE + "px";
      parent.style.width = SEAT_SIZE + "px";

      const circle = document.createElement("div");
      circle.className = "seat";
      circle.style.height = SEAT_SIZE - SEAT_SPACING + "px";
      circle.style.width = SEAT_SIZE - SEAT_SPACING + "px";

      parent.append(circle);

      element.append(parent);
    }
  }
}

populateBlocks(vip, 500, 200)
populateBlocks(premium, 800, 250)
populateBlocks(regular, 900, 400)


document.getElementById("venue").addEventListener("click", (event) => {
  let root;

  if (event.target.className === "seat") {
    root = event.target.parentNode.parentNode;
  } else if (event.target.className === "seat-parent") {
    root = event.target.parentNode;
  }

  if (!root) return;

  const section = root.id;
  const map = root.getBoundingClientRect();

  let relativeMouseX = event.clientX - map.left;
  let relativeMouseY = event.clientY - map.top;

  const [coordX, coordY] = [
    Math.floor(relativeMouseX / SEAT_SIZE),
    Math.floor(relativeMouseY / SEAT_SIZE)
  ]

  console.log(section, coordX, coordY);
})
