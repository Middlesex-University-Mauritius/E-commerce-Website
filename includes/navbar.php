<!-- Navbar section -->

<?php

function links($authenticated, $id) {
  if ($authenticated === true) {
    echo <<<DEV
      <li>
        <a href="/web/events">
          <i class="far fa-star"></i>
          <span>Events</span>
        </a>
      </li>
      
      <li>
        <button id="dropdownDividerButton" class="cursor-pointer"  data-dropdown-toggle="dropdownDivider">
          <i class="far fa-user"></i>
          <span>Account</span>
        </button>

        <div id="dropdownDivider" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
          <ul class="py-1" aria-labelledby="dropdownDividerButton">
            <li>
              <a href="/web/profile?id=$id" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <a href="/web/admin/signin" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="/web/profile" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Orders</a>
            </li>
          </ul>
          <div class="py-1">
            <a href="/web/logout" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
          </div>
        </div>
      </li>

      <li>
        <a href="/web/checkout">
          <div class="relative">
            <p id="cart-count" class="absolute m-0 -top-2 -right-2 p-1 rounded-full h-7 leading-none text-sm text-yellow-200 my-auto font-semibold">
              0
            </p>
            <i class="fas fa-shopping-cart"></i>
          </div>
          <span>Cart</span>
        </a>
      </li>
    DEV;
  } else {
    echo <<<DEV
      <li>
        <a href="/web/events">
          <i class="far fa-star"></i>
          <span>Events</span>
        </a>
      </li>
      <li>
        <button id="dropdownButton" class="cursor-pointer"  data-dropdown-toggle="dropdown">
          <i class="far fa-user"></i>
          <span>Account</span>
        </button>

        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
          <ul class="py-1" aria-labelledby="dropdownDividerButton">
            <li>
              <a href="/web/signin" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign-In</a>
            </li>
            <li>
              <a href="/web/register" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Register</a>
            </li>
            <li>
              <a href="/web/admin/signin" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/web/checkout">
          <div class="relative">
            <p id="cart-count" class="absolute m-0 -top-2 -right-2 p-1 rounded-full h-7 leading-none text-sm text-yellow-200 my-auto font-semibold">
              0
            </p>
            <i class="fas fa-shopping-cart"></i>
          </div>
          <span>Cart</span>
        </a>
      </li>
    DEV;
  }
}

function navbar()
{
  echo <<<DEV
  <div class="nav">
    <div class="logo">
      <a href="/web/home/index.php"><img src="../includes/img/logo.png" alt="Tixx logo"></a>
    </div>

    <div class="search-box">
      <input class="search-text" type="text" name="search-text" placeholder="Search for event">
      <button><i class="fa fa-search"></i></button>
    </div> 

    <ul class="nav-links">
  DEV;

  if (isset($_COOKIE["userId"])) {
    echo links(true, $_COOKIE["userId"]);
  } else {
    echo links(false, null);
  }


  echo <<<DEV
    </ul>
  </div>
  DEV;
}
