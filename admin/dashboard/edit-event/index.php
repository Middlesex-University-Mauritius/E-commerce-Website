<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "../../includes/head.php";
  head();
  ?>
</head>

<body id="body">
  <!-- Delete Product Modal -->
  <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="popup-modal">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow white:bg-gray-700">
        <!-- Modal header -->
        <div class="flex justify-end p-2">
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center white:hover:bg-gray-800 white:hover:text-white" data-modal-toggle="popup-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 pt-0 text-center">
          <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 white:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 white:text-gray-400">Are you sure you want to delete this product?</h3>
          <button id="delete" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
              Yes, I'm sure
          </button>
          <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 white:bg-gray-700 white:text-gray-300 white:border-gray-500 white:hover:text-white white:hover:bg-gray-600">No, cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="flex">
    <!-- Sidebar -->
    <?php
    include_once "../../includes/sidebar.inc.php";
    ?>

    <!-- Dashboard Wrapper -->
    <div class="dashboard-content w-full h-screen flex flex-col justify-between ml-40">

      <div>
        <!-- Page header -->
        <p class="text-3xl px-10 py-6 border-b w-full bg-white">Edit Event</p>

        <div class="flex-1 py-6 px-10">
          <!-- Event form -->
          <?php
          include_once '../../includes/event-form.php';
          renderForm();
          ?>

          <!-- Delete event -->
          <div class='card p-0 mt-8'>
            <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
              <p class="font-semibold">Delete event</p>
            </div>
            <div class="py-2 px-5 m-0 flex justify-between">
              <p class="my-auto">Once you delete an event, there is no going back. Please be certain.</p>
              <button data-modal-toggle="popup-modal" class="warning py-2 px-4">Delete event</button>
            </div>
          </div>

        </div>
      </div>

      <!-- Form cancel and update buttons -->
      <div class="w-full bg-white px-10 py-4 border-t">
        <div class="float-right flex space-x-4">
          <button class="cancel py-3 px-6 my-auto">Cancel</button>
          <button id="proceed" class="primary py-3 px-6 my-auto">Update</button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./js/index.js"></script>
</body>

</html>