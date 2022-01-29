<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../styles.css">
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <title>Dashboard</title>
</head>

<body id="body">
  <div class="flex">
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <div class="dashboard-content w-full h-screen flex flex-col justify-between ml-40">

      <div>
        <p class="text-3xl px-10 py-6 border-b w-full bg-white">
          <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
        </p>

        <div class="flex-1 py-6 px-10">
          <div class='flex space-x-10'>
            <div class='flex-1'>
              <p class='text-lg mb-4'>Main Information</p>
              <div class='card space-y-2'>
                <div>
                  <p class='text-gray-700'>Title</p>
                  <input class='my-2 w-full' type='text' id='title' name='title'>
                </div>

                <div>
                  <p class='text-gray-700'>Description</p>
                  <textarea class='my-2 w-full p-4 h-[200px] resize-none' id='description' name='description'></textarea>
                </div>

                <div>
                  <p class='text-gray-700 mb-2 mt-[-8px]'>Date</p>
                  <input type='date' id='date' name='date'>
                </div>

                <div>
                  <p class='text-gray-700 mb-2 mt-5'>Time</p>
                  <input type='time' id='time' name='time'>
                </div>
              </div>
            </div>

            <div class='flex-1'>
              <p class='text-lg mb-4'>SEO</p>
              <div class='card space-y-2'>

                <div class='flex flex-col space-y-2'>
                  <div>
                    <input checked onchange="onCategoryChange(this)" type='checkbox' id='live-music' />
                    <label class='ml-1 select-none cursor-pointer' for='live-music'>Live music</label>
                  </div>

                  <div>
                    <input onchange="onCategoryChange(this)" type='checkbox' id='stand-up' />
                    <label class='ml-1 select-none cursor-pointer' for='stand-up'>Stand up</label>
                  </div>

                  <div>
                    <input onchange="onCategoryChange(this)" type='checkbox' id='arts-and-theater' />
                    <label class='ml-1 select-none cursor-pointer' for='arts-and-theater'>Arts & Theater</label>
                  </div>
                </div>

                <br>
                <div>
                  <p>Tags</p>
                  <input id="tag" class='my-2 w-full' type='text'>

                  <div id="tags-container" class="flex flex-wrap">
                  </div>
                </div>

              </div>

              <p class='text-lg mb-4 mt-6'>Pricing</p>
              <div class="card">
                <div class="flex flex-col 2xl:flex-row 2xl:space-x-4">
                  <div>
                    <p class='text-gray-700 whitespace-nowrap'>Price (Regular)</p>
                    <input id="regular" class='my-2 w-full' type='number' step="100">
                  </div>

                  <div>
                    <p class='text-gray-700 whitespace-nowrap'>Price (Premium)</p>
                    <input id="premium" class='my-2 w-full' type='number' step="100">
                  </div>

                  <div>
                    <p class='text-gray-700 whitespace-nowrap'>Price (VIP)</p>
                    <input id="vip" class='my-2 w-full' type='number' step="100">
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="w-full bg-white px-10 py-4 border-t">
        <div class="float-right flex space-x-4">
          <button class="cancel py-3 px-6 my-auto">Cancel</button>
          <button id="confirm" class="primary py-3 px-6 my-auto">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const parent = document.getElementById("body");
    const tag = document.getElementById("tag");
    const notification = new Notification(parent);
    const tagsContainer = document.getElementById("tags-container");
    let tags = [];

    tag.addEventListener("keydown", (e) => {
      if (e.key === 'Enter') {
        const tagInput = document.createElement("div");
        tagInput.innerText = e.target.value;
        tagInput.className = "bg-blue-200 rounded-md px-3 py-2 text-sm m-1 first:ml-0 flex cursor-pointer hover:bg-blue-300";
        tagInput.addEventListener("click", () => {
          tagInput.remove();
        })
        tagsContainer.appendChild(tagInput);
      }
    })

    const tagsNodes = tagsContainer.childNodes;

    const checks = ["live-music", "stand-up", "arts-and-theater"]
    let category = "live-music";

    const formInputs = {
      title: document.getElementById("title"),
      description: document.getElementById("description"),
      date: document.getElementById("date"),
      time: document.getElementById("time"),
      regular: document.getElementById("regular"),
      premium: document.getElementById("premium"),
      vip: document.getElementById("vip"),
    }

    window.onCategoryChange = function(e) {
      checks.forEach((check) => {
        if (check !== e.id) {
          document.getElementById(check).checked = false
        } else {
          category = e.id
        }
      })
    }

    const confirm = document.getElementById("confirm");

    Object.values(formInputs).forEach((input) => input.addEventListener("input", () => input.classList.remove("error")));

    confirm.addEventListener("click", () => {
      if (tagsNodes.length >= 1) {
        tagsNodes.forEach((tag) => {
          if (tag.innerText) {
            tags.push(tag.innerText)
          }
        });
      }

      let validated = true;

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
        prices: {
          regular: regular.value,
          premium: premium.value,
          vip: vip.value,
        }

      })

      axios.post("/web/admin/includes/services/addEvent.php", {
        title: formInputs.title.value,
        description: formInputs.description.value,
        date: formInputs.date.value,
        time: formInputs.time.value,
        category: category,
        tags,
        prices: {
          regular: regular.value,
          premium: premium.value,
          vip: vip.value,
        }
      }).then((response) => {
        const { data } = response;

        if (data.success) {
        } else {
        }

      }).catch(function(error) {
      })

    })
  </script>
</body>

</html>