import Notification from "../../../../includes/js/view/notification.view.js";

const parent = document.getElementById("body");
const tag = document.getElementById("tag");
const eventImage = document.getElementById("event-image");
const tagsContainer = document.getElementById("tags-container");

tag.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && e.target.value.trim().length >= 1) {
    const tagInput = document.createElement("div");
    tagInput.innerText = e.target.value;
    tagInput.className = "tag";
    tagInput.addEventListener("click", () => {
      tagInput.remove();
    });
    tagsContainer.appendChild(tagInput);
    tag.value = "";
  }
});

const tagsNodes = tagsContainer.childNodes;

const checks = ["live-music", "stand-up", "arts-and-theater"];
let category = "live-music";

const formInputs = {
  title: document.getElementById("title"),
  description: document.getElementById("description"),
  date: document.getElementById("date"),
  time: document.getElementById("time"),
  regular: document.getElementById("regular"),
  premium: document.getElementById("premium"),
  vip: document.getElementById("vip"),
};

window.onCategoryChange = function (e) {
  checks.forEach((check) => {
    if (check !== e.id) {
      document.getElementById(check).checked = false;
    } else {
      category = e.id;
    }
  });
};

const proceed = document.getElementById("proceed");

Object.values(formInputs).forEach((input) =>
  input.addEventListener("input", () => input.classList.remove("error"))
);

proceed.addEventListener("click", () => {
  proceed.disabled = true;

  // Prepare tags for upload
  let tags = [];
  if (tagsNodes.length >= 1) {
    tagsNodes.forEach((tag) => {
      if (tag.innerText) tags.push(tag.innerText);
    });
  }

  // Validate other fields
  let validated = true;
  if (eventImage.files.length === 0) {
    validated = false;
    eventImage.classList.add("error");
  }
  Object.values(formInputs).forEach((input) => {
    if (input.value.length === 0) {
      validated = false;
      input.classList.add("error");
    }
  });

  // Validation successful
  if (!validated) return;

  // Prepare image for upload
  const formData = new FormData();
  const files = eventImage.files;
  let images = []
  for (let i = 0; i < files.length; i++) {
    formData.append("file[]", files[i]);
    images.push(`image-${i}.${files[i].name.split(".").pop()}`);
  }

  // Append other field inputs to form 
  formData.append("title", formInputs.title.value)
  formData.append("description", formInputs.description.value)
  formData.append("date", formInputs.date.value)
  formData.append("time", formInputs.time.value)
  formData.append("category", category)
  formData.append("images", JSON.stringify(images))
  formData.append("tags", JSON.stringify(tags))
  formData.append("prices", JSON.stringify({
    regular: regular.value,
    premium: premium.value,
    vip: vip.value,
  }))

  axios
    .post("/web/admin/includes/controllers/add-event.controller.php", formData, {
      header: {
        "Content-Type": "multipart/form-data",
      }
    })
    .then((response) => {
      const { data } = response;
      const notification = new Notification(parent);

      if (data.success) {
        notification.render("Event created successfully", "success")
      } else {
        notification.render("Something went wrong when creating event", "error")
      }

      setTimeout(() => {
        window.location.href = "/web/admin/dashboard/events/events.php";
        proceed.disabled = false;
      }, 2000)
    })
    .catch(() => {
      proceed.disabled = false;
    });
});
