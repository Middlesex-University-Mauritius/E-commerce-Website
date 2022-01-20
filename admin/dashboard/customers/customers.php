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

      <p class="text-3xl px-10 py-6 border-b w-full">
        <?php echo ucfirst(basename($_SERVER['PHP_SELF'], ".php")) ?>
      </p>

      <div class="flex-1 py-6 px-10">

        <div class='flex space-x-10'>
          <table>
            <tr>
              <th>Date</th>
              <th>Customer Name</th>
              <th>Event ID</th>
              <th>Category</th>
              <th>Tickets</th>
              <th>Charge</th>
            </tr>

            <tr>
              <td>22/02/2022</td>
              <td>
                <div class="flex space-x-3">
                  <img class="rounded-full w-8 h-8 border" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKSEuKKwqIqbJH-NRiDHluGbuC9ysMW99BPA&usqp=CAU" alt="" srcset="">
                  <p class="my-auto">James Gordon</p>
                </div>
              </td>
              <td>#001</td>
              <td>Concert</td>
              <td>x3</td>
              <td>Rs 3,500</td>
            </tr>
          </table>
        </div>

      </div>
    </div>
  </div>
</body>

</html>