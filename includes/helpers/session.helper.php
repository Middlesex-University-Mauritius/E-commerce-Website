<?php

class SessionHelper {
  function __construct() {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  function setUser($customer_id) {
    $_SESSION["customer_id"] = $customer_id;
  }

  function isSignedIn() {
    return isset($_SESSION['customer_id']) && isset($_COOKIE['customer_id']);
  }

  function logout() {
    session_unset();
    session_destroy();
  }

}