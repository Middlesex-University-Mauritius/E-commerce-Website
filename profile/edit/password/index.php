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
          <p class="font-semibold">Change Password</p>
        </div>

        <!-- Change password form -->
        <div class="py-2 px-5">
          <div class="w-full">
            <p class="text-gray-900">Old password</p>
            <input class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="old-password" name="old-password">
          </div>
          <div class="w-full">
            <p class="text-gray-900">New password</p>
            <input class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="new-password" name="new-password">
          </div>
          <div class="w-full">
            <p class="text-gray-900">Confirm new password</p>
            <input class="my-2 w-full bg-gray-50 border border-gray-300" type="password" id="confirm-new-password" name="confirm-new-password">
          </div>
        </div>
      </div>

      <button disabled class="edit p-2 w-[800px]">Update profile</button>
    </div>

  </div>

  <?php
  include_once "../../../includes/footer.php";
  footer();
  ?>

  <script type="module" src="./js/index.js"></script>

</body>

</html>