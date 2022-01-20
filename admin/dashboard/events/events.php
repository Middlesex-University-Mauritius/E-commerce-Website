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

    <div class="w-full">

      <p class="text-3xl px-10 py-6 border-b w-full bg-white">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">

        <table>
          <tr>
            <th>Product</th>
            <th>List Price</th>
            <th>Bookings</th>
            <th></th>
          </tr>

          <tr>
            <td>
              <div class="flex space-x-4 w-[800px] h-40">
                <img class="h-40 w-40 rounded" src="https://generative-placeholders.glitch.me/image?width=1200&height=400&style=cellular-automata&cells=80" alt="" srcset="">
                <div class="space-y-3">
                  <div>
                    <p class="font-bold">This is a simple title</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus facilis quia, pariatur maxime nisi blanditiis, neque aliquid dolorum, possimus ea repudiandae! Odit delectus voluptate amet! Itaque ullam libero labore vel!</p>
                  </div>
                  <div class="flex space-x-2">
                    <a class="tag" href="#">Concert</a>
                    <a class="tag" href="#">Live music</a>
                  </div>
                </div>
              </div>
            </td>
            <td>Rs 700-1800</td>
            <td>
              <div class="flex space-x-2">
                <i class="fas fa-users text-lg"></i>
                <p class="my-auto">12</p>
              </div>
            </td>
            <td>
              <button class="edit py-2 px-4">Edit Product</button>
            </td>
          </tr>
        </table>
      </div>

    </div>
  </div>
</body>

</html>