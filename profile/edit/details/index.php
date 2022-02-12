<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "../../../includes/head.php";
head(true);
?>
</head>

<body id="body">
  <?php
  include_once "../../../includes/navbar.php";
  navbar();
  ?>

  <div class="wrapper py-[77px] w-max mx-auto flex space-x-10">

    <?php
    include_once "../includes/sidebar.php";
    renderSidebar();
    ?>

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
              <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="first-name" name="first-name">
            </div>
            <div class="w-full">
              <p class="text-gray-900">Last Name</p>
              <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="last-name" name="last-name">
            </div>
          </div>

          <div class="flex space-x-4">
            <div class="w-full">
              <p class="text-gray-900">Age</p>
              <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="number" id="age" name="age">
            </div>
            <div class="w-full">
              <p class="text-gray-900">Phone</p>
              <input required class="my-2 w-full bg-gray-50 border border-gray-300" type="text" id="phone" name="phone">
            </div>
          </div>
        </div>
      </div>

      <button id="update-profile-button" class="edit py-2 px-4 text-sm">Update profile</button>
    </div>

  </div>

  <?php
  include_once "../../../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>