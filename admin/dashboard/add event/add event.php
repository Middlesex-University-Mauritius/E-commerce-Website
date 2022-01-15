<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../styles.css">
  <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dashboard</title>
</head>

<body id="body">
  <div class="flex">
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <div class="w-full h-screen flex flex-col justify-between">

      <div>
        <p class="text-3xl px-10 py-6 border-b w-full">
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
                  <textarea class='my-2 w-full p-4 h-[200px]' id='description' name='description'></textarea>
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
                    <input onchange="onCategoryChange(this)" type='checkbox' id='live-music' />
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

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="w-full bg-white px-10 py-4 border-t">
        <div class="float-right flex space-x-4">
          <button class="cancel py-3 px-6 my-auto">Cancel</button>
          <button class="primary py-3 px-6 my-auto">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const checks = ["live-music", "stand-up", "arts-and-theater"]

    function onCategoryChange(e) {
      checks.forEach((check) => {
        if (check !== e.id) {
          document.getElementById(check).checked = false
        }
      })
    }
  </script>

  <script type="module" src="./js/index.js"></script>
</body>

</html>