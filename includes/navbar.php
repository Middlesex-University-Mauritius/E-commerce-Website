<!-- Navbar section -->

<?php

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
      <li>
        <a href="/web/events">
          <i class="far fa-star"></i>
          <span>Events</span>
        </a>
      </li>
      <li>
        <a href="/web/signin">
          <i class="far fa-user"></i>
          <span>Account</span>
        </a>
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
    </ul>
  </div>
  DEV;
}
