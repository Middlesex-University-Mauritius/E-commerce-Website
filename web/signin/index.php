<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login</title>
</head>

<body id="body">

  <div class="w-[400px] mx-auto mt-20">
    <p class="text-2xl mb-4 text-gray-800">Sign-In</p>
    <form id="register" class="card" action="user.controller.php" method="post">
      <div class="space-y-2">
        <div>
          <p class="text-gray-700">Email</p>
          <input class="my-2 w-full" type="email" id="email" name="email">
        </div>

        <div>
          <p class="text-gray-700">Password</p>
          <input class="my-2 w-full" type="password" id="password" name="password">
        </div>
      </div>

      <button id="login-btn" class="primary py-3 mt-4 w-full">Sign In</button>

      <div class="flex place-content-center mt-4 space-x-1">
        <p>Don't have an account?</p>
        <p class="text-blue-800 underline cursor-pointer">Register</p>
      </div>
    </form>
  </div>

  <script type="module" src="../includes/js/scripts/authentication.js"></script>
  <script type="module" src="../includes/js/view/message.view.js"></script>
  <script type="module" src="./js/index.js"></script>

</body>

</html>