<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "../includes/head.php";
  $validateUser = false;
  head($validateUser);
  ?>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <!-- Main page sign in card -->
  <div class="w-[400px] mx-auto py-[77px]">
    <p class="text-2xl mb-4 text-gray-800 mt-8">Sign-In</p>
    <form id="register" class="card p-0" action="user.controller.php" method="post">
      <div class="p-5">
        <div class="space-y-2">
          <div>
            <p class="text-gray-900">Email</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300 border border-gray-300" type="email" id="email" name="email">
          </div>

          <div>
            <p class="text-gray-900">Password</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300 border border-gray-300" type="password" id="password" name="password">
          </div>

          <div id="errors"></div>
        </div>

        <button id="login-btn" class="primary py-3 mt-4 w-full">Sign In</button>

        <!-- Registration page redirection link -->
        <div class="flex place-content-center mt-4 space-x-1">
          <p>Don't have an account?</p>
          <a href="/web/register" class="text-blue-800 underline cursor-pointer">Register</a>
        </div>
      </div>

      <!-- Dashboard / CMS link -->
      <div class="bg-gray-50 border-t p-5 mt-5 flex space-x-2">
        <p>Are you an admin?</p>
        <a href="/web/admin/signin" class="text-blue-600 underline">login to dashboard</a>
      </div>
    </form>
  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>