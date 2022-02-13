import Notification from "../../../../includes/js/view/notification.view.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const tagsContainer = document.getElementById("tags-container");
const deleteButton = document.getElementById("delete");

// Fields
const title = document.getElementById("title");
const description = document.getElementById("description");
const date = document.getElementById("date");
const time = document.getElementById("time");

// Pricing
const regular = document.getElementById("regular");
const premium = document.getElementById("premium");
const vip = document.getElementById("vip");

// Image
const eventImage = document.getElementById("event-image");

const parent = document.getElementById("body");

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

const categories = ["live-music", "stand-up", "arts-and-theater"];

// Set values on load
window.onload = async () => {
  try {
    const options = {
      params: {
        id: params.id
      }
    }

    const response = await axios.get("/web/includes/controllers/event-by-id.controller.php", options)

    const { data } = response;
    if (!data) {
      return;
    }

    if (data.length <= 0) return;

    const event = data[0];

    title.value = event.title;
    description.value = event.description;
    date.value = event.date;
    time.value = event.time;

    regular.value = event.prices.regular;
    premium.value = event.prices.premium;
    vip.value = event.prices.vip;

    const preview = document.getElementById("preview");
    preview.hidden = false;

    event.images.forEach((img) => {
      const image = document.createElement("img");
      image.src = `/web/__images__/${event._id.$oid}/${img}`;
      image.className = "w-full h-28 object-cover";
      preview.append(image);
    });

    categories.forEach((cat) => {
      if (cat !== event.category) {
        document.getElementById(cat).checked = false
      } else {
        document.getElementById(event.category).checked = true
      }
    })

    event.tags.forEach((tag) => {
      const tagInput = document.createElement("div");
      tagInput.innerText = tag;
      tagInput.className = "tag";
      tagInput.addEventListener("click", () => {
        tagInput.remove();
      });
      tagsContainer.append(tagInput);
    })

  } catch(error) {
  }

}

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
  deleteButton.disabled = true;

  // Prepare tags for upload
  let tags = [];
  if (tagsNodes.length >= 1) {
    tagsNodes.forEach((tag) => {
      if (tag.innerText) tags.push(tag.innerText);
    });
  }

  // Validate other fields
  let validated = true;
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
  formData.append("averagePrice", JSON.stringify(parseFloat((Number(regular.value) + Number(premium.value) + Number(vip.value)) / 3).toFixed()))
  formData.append("images", JSON.stringify(images))
  formData.append("tags", JSON.stringify(tags))
  formData.append("prices", JSON.stringify({
    regular: regular.value,
    premium: premium.value,
    vip: vip.value,
  }))

  axios
    .post("/web/admin/includes/controllers/update-event.controller.php", formData, {
      params: {
        id: params.id
      },
      header: {
        "Content-Type": "multipart/form-data",
      }
    })
    .then((response) => {
      const notification = new Notification(parent);
      const { data } = response;

      if (data.success) {
        notification.render(data.message, "success")
      } else {
        notification.render(data.message, "error")
      }

      setTimeout(() => {
        window.location.href = "/web/admin/dashboard/events/events.php";
        proceed.disabled = false;
        deleteButton.disabled = false;
      }, 2000)
    })
    .catch(() => {
      notification.render("Something went wrong when updating event", "error")
      proceed.disabled = false;
      deleteButton.disabled = false;
    });
});

deleteButton.addEventListener("click", async () => {
  proceed.disabled = true;
  deleteButton.disabled = true;

  const notification = new Notification(parent);

  const response = await axios.delete(`/web/admin/includes/controllers/delete-event.controller.php`, {
    params: {
      id: params.id
    }
  })
  const { data } = response;

  if (data.success) {
    notification.render(data.message, "success")
  } else {
    notification.render(data.message, "error")
  }

  setTimeout(() => {
    window.location.href = "/web/admin/dashboard/events/events.php";
    proceed.disabled = false;
    deleteButton.disabled = false;
  }, 2000)
})