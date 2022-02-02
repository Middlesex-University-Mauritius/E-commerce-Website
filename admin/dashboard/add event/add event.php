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
  <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuidv4.min.js" integrity="sha512-BCMqEPl2dokU3T/EFba7jrfL4FxgY6ryUh4rRC9feZw4yWUslZ3Uf/lPZ5/5UlEjn4prlQTRfIPYQkDrLCZJXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />
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
            <div class='flex-1 space-y-8'>
              <!-- Main Information -->
              <div class='card p-0 space-y-2'>
                <div class="bg-gray-50 border-b p-5 flex space-x-2">
                  <p class="font-semibold">Main Information</p>
                </div>

                <div class="p-5">
                  <div>
                    <p class='text-gray-700'>Title</p>
                    <input class='my-2 w-full' type='text' id='title' name='title'>
                  </div>

                  <div>
                    <p class='text-gray-700'>Description</p>
                    <textarea class='my-2 w-full p-4 h-[200px] resize-none rounded border-gray-300 focus:border-sky-50' id='description' name='description'></textarea>
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

              <!-- Image Upload -->
              <div class='card space-y-2 p-0'>
                <div class="bg-gray-50 border-b p-5 flex space-x-2">
                  <p class="font-semibold">Image Upload</p>
                </div>
                <div class='p-5'>
                  <input
                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer white:text-gray-400 focus:outline-none focus:border-transparent white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400"
                    id="event-image"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                  >
                  <div class="mt-1 text-sm text-gray-500 white:text-gray-300">A profile picture is useful to confirm your are logged into your account</div>
                  <br>

                  <img hidden id="preview" class="w-full h-60 object-contain" src="/web/images/eacb61df-906b-4376-9d0e-f2b9f2ab01b5/image.jpeg" alt="" />
                </div>
              </div>
            </div>

            <div class='flex-1 space-y-8'>
              <!-- SEO -->
              <div class='card space-y-2 p-0'>
                <div class="bg-gray-50 border-b p-5 flex space-x-2">
                  <p class="font-semibold">SEO</p>
                </div>

                <div class='p-5 flex flex-col space-y-2'>
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

                  <br>
                  <!-- Tags -->
                  <div>
                    <p>Tags</p>
                    <input id="tag" class='my-2 w-full' type='text'>

                    <div id="tags-container" class="flex flex-wrap">
                    </div>
                  </div>
                </div>

              </div>

              <!-- Pricing -->
              <div class="card p-0">
                <div class="bg-gray-50 border-b p-5 flex space-x-2">
                  <p class="font-semibold">Pricing</p>
                </div>

                <div class="flex flex-col p-5 2xl:flex-row 2xl:space-x-4">
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

  <script type="module" src="./js/index.js"></script>
</body>

</html>