const parent = document.getElementById("body");
const tag = document.getElementById("tag");
const eventImage = document.getElementById("event-image");
const notification = new Notification(parent);
const tagsContainer = document.getElementById("tags-container");
const preview = document.getElementById("preview");
let tags = [];
let sessionId = null;
let images = [];

window.onload = async () => {
  sessionId = await uuidv4();
};

eventImage.addEventListener("change", async () => {
  if (!sessionId) return;

  const formData = new FormData();
  const files = eventImage.files;

  for (let i = 0; i < files.length; i++) {
    formData.append("file[]", files[i]);
  }

  const response = await axios.post(
    "/web/admin/includes/services/upload.php",
    formData,
    {
      params: {
        sessionId,
      },
      header: {
        "Content-Type": "multipart/form-data",
      },
    }
  );

  console.log(response);

  if (response.data) {
    preview.hidden = false;

    response.data.forEach((img) => {
      const image = document.createElement("img");
      image.src = img;
      image.className = "w-full h-28 object-cover";
      preview.append(image);
    });

    images = response.data;
  }
});

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

const confirm = document.getElementById("confirm");

Object.values(formInputs).forEach((input) =>
  input.addEventListener("input", () => input.classList.remove("error"))
);

confirm.addEventListener("click", () => {
  confirm.disabled = true;

  if (tagsNodes.length >= 1) {
    tagsNodes.forEach((tag) => {
      if (tag.innerText) {
        tags.push(tag.innerText);
      }
    });
  }

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

  if (!validated) return;

  console.log({
    title: formInputs.title.value,
    description: formInputs.description.value,
    date: formInputs.date.value,
    time: formInputs.time.value,
    category: category,
    tags,
    images,
    prices: {
      regular: regular.value,
      premium: premium.value,
      vip: vip.value,
    },
  });

  axios
    .post("/web/admin/includes/controllers/add-event.controller.php", {
      title: formInputs.title.value,
      description: formInputs.description.value,
      date: formInputs.date.value,
      time: formInputs.time.value,
      category: category,
      tags,
      images,
      prices: {
        regular: regular.value,
        premium: premium.value,
        vip: vip.value,
      },
    })
    .then((response) => {
      const { data } = response;

      if (data.success) {
        window.location.href = "/web/admin/dashboard/events/events.php";
      } else {
        window.location.href = "/web/admin/dashboard/events/events.php";
      }
      confirm.disabled = false;
    })
    .catch(() => {
      confirm.disabled = false;
    });
});
