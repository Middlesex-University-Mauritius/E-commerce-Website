<!-- Navbar section -->

<?php

function links($authenticated, $id) {
  if ($authenticated === true) {
    echo <<<DEV
      <li>
        <a href="/web/events">
          <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          <span>Events</span>
        </a>
      </li>
      
      <li>
        <button id="dropdownDividerButton" class="cursor-pointer"  data-dropdown-toggle="dropdownDivider">
          <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          <span>Account</span>
        </button>

        <div id="dropdownDivider" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
          <ul class="py-1" aria-labelledby="dropdownDividerButton">
            <li>
              <a href="/web/profile" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <a href="/web/admin/signin" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="/web/bookings" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Bookings</a>
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
            <p id="cart-count" class="absolute m-0 -top-1 -right-1 p-1 rounded-full h-7 leading-none text-md text-yellow-200 my-auto font-semibold">
              0
            </p>
            <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
          </div>
          <span>Cart</span>
        </a>
      </li>
    DEV;
  } else {
    echo <<<DEV
      <li>
        <a href="/web/events">
          <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          <span>Events</span>
        </a>
      </li>
      <li>
        <button id="dropdownButton" class="cursor-pointer"  data-dropdown-toggle="dropdown">
          <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
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
            <p id="cart-count" class="absolute m-0 -top-1 -right-1 p-1 rounded-full h-7 leading-none text-md text-yellow-200 my-auto font-semibold fade">
              0
            </p>
            <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
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
  <div id="nav" class="nav">
    <div class="logo">
      <a href="/web/home/index.php"><img src="../includes/img/logo.png" alt="Tixx logo"></a>
    </div>

    <form id="navbar-search-box" class="search-box mx-auto my-auto">
      <input id="navbar-search-input" class="search-text" type="text" placeholder="Search for event">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form> 

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