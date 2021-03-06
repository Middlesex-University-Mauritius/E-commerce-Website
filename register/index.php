<!DOCTYPE html>
<html lang="en">

<?php
include_once "../includes/head.php";
head();
?>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <!-- Registration card -->
  <div class="w-[400px] mx-auto py-[77px]">
    <p class="text-2xl mb-4 text-gray-800 mt-8">Create an account</p>
    <form id="register" class="card" action="user.controller.php" method="post">
      <div class="space-y-2">
        <div>
          <p class="text-gray-900">Email</p>
          <input required class="my-2 w-full bg-gray-50 border border-gray-300 border border-gray-300" type="email" id="email" name="email">
        </div>

        <div class="flex space-x-4">
          <div>
            <p class="text-gray-900">First Name</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="firstName" name="firstName">
          </div>
          <div>
            <p class="text-gray-900">Last Name</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="lastName" name="lastName">
          </div>
        </div>

        <div class="flex space-x-4">
          <div>
            <p class="text-gray-900">Age</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="number" id="age" name="age">
          </div>
          <div>
            <p class="text-gray-900">Phone</p>
            <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="phone" name="phone">
          </div>
        </div>

        <div>
          <p class="text-gray-900">Password</p>
          <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="password" name="password">
        </div>

        <div>
          <p class="text-gray-900">Confirm Password</p>
          <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="confirmPassword" name="confirmPassword">
        </div>

        <div id="errors"></div>
      </div>

      <button id="register-btn" class="primary py-3 mt-4 w-full">Register</button>

      <!-- Login redirection link -->
      <div class="flex place-content-center mt-4 space-x-1">
        <p>Already have an account?</p>
        <a href="/web/signin" class="text-blue-800 underline cursor-pointer">Login</a>
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