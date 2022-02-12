<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../includes/head.php";
head(true);
?>
</head>

<body id="body">
  <?php
  include_once "../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper py-[77px] w-max mx-auto flex space-x-10">

    <div class="w-[300px] text-gray-900 bg-white rounded-lg border border-gray-200 mt-8 h-max">
      <button id="profile-button" type="button" class="inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
        <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        Profile
      </button>
      <button id="change-password-button" type="button" class="inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
        <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
        Change password
      </button>
    </div>

    <div>
      <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 mt-8">Edit Profile</h5>

      <div class="card p-0 mb-8 w-[800px]">
        <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md justify-between">
          <p class="font-semibold">Your Personal Details</p>
        </div>

        <div class="py-2 px-5">
          <div class="flex space-x-4">
            <div class="w-full">
              <p class="text-gray-900">First Name</p>
              <input class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="first-name" name="first-name">
            </div>
            <div class="w-full">
              <p class="text-gray-900">Last Name</p>
              <input class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="last-name" name="last-name">
            </div>
          </div>

          <div class="flex space-x-4">
            <div class="w-full">
              <p class="text-gray-900">Age</p>
              <input class="my-2 w-full bg-gray-50 border border-gray-300" type="number" id="age" name="age">
            </div>
            <div class="w-full">
              <p class="text-gray-900">Phone</p>
              <input class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="phone" name="phone">
            </div>
          </div>
        </div>
      </div>

      <div class="card p-0 mb-8 w-[800px]">
        <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md justify-between">
          <p class="font-semibold">Change password</p>
        </div>

        <div class="py-2 px-5">
          <div class="w-full">
            <p class="text-gray-900">Old Password</p>
            <input class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="password" name="password">
          </div>
          <div class="w-full">
            <p class="text-gray-900">Confirm Password</p>
            <input class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="confirm-password" name="confirm-password">
          </div>
        </div>
      </div>

      <button disabled class="edit p-2 w-[800px]">Update profile</button>
    </div>

  </div>

  <?php
  include_once "../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>