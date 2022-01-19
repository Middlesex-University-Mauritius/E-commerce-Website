<?php

function navbar() {
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
        <a href="#">
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
          <i class="fas fa-shopping-cart"></i>
          <span>Cart</span>
        </a>
      </li>
    </ul>
  </div>
  DEV;
}