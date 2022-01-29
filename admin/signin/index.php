<?php
  session_start();

  $authenticated = isset($_SESSION["admin-authenticated"]);

  if ($authenticated) {
    header("Location: /web/admin/dashboard/customers/customers.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login</title>
</head>

<body id="body">
  <?php
  $ERROR = false;
  $username = $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username !== "admin" || $password !== "password") {
      $ERROR = true;
    } else {
      session_start();

      $_SESSION["admin-authenticated"] = true;

      header("Location: /web/admin/dashboard/customers/customers.php");
      exit;
    }
  }

  ?>

  <div class="w-[400px] mx-auto mt-20">
    <p class="text-2xl text-gray-800 mb-2">Sign-In (CMS)</p>
    <p class="mb-4 text-sm text-gray-700">Manage customers, orders and events</p>
    <form id="login" class="card p-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="p-5">
        <div class="space-y-2">
          <div>
            <p class="text-gray-700">Username</p>
            <input class="my-2 w-full" type="text" id="username" name="username">
          </div>

          <div>
            <p class="text-gray-700">Password</p>
            <input class="my-2 w-full" type="password" id="password" name="password">
          </div>
        </div>

        <?php
        if ($ERROR) {
          echo '<p id="admin-error" class="text-red-800 mt-4 mb-0">Invalid username or password</p>';
        }
        ?>

        <input id="admin-submit" class="primary py-3 mt-4 w-full cursor-pointer" type="submit" name="submit" value="Submit">
      </div>

      <div class="p-5 bg-gray-50 border-t">
        <p class="text-gray-600">For development purposes, use <span class="text-green-600">admin</span> and <span class="text-green-600">password</span> as credentials</p>
        <a href="/web/home" class="text-gray-600 text-blue-700 block mt-3">Go back to main page</a>
      </div>
    </form>

    <a href="/web/home" class="block transition ease-in-out delay-50 py-3 px-4 mt-4 text-center rounded text-gray-600 hover:text-blue-600">Go back to main website</a>
  </div>

  <script type="module" src="../../includes/js/scripts/authentication.js"></script>
  <script type="module" src="../../includes/js/view/message.view.js"></script>
  <script type="module" src="./js/index.js"></script>


</body>

</html>