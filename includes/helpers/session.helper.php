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
    return (isset($_SESSION['customer_id']) and isset($_COOKIE['customer_id']));
  }

  function getUser() {
    if ($this->isSignedIn()) {
      return $_SESSION['customer_id'];
    } else {
      return null;
    }
  }

  function logout() {
    session_unset();
    session_destroy();
    if (isset($_COOKIE['customer_id'])) {
      unset($_COOKIE['customer_id']); 
      setcookie('customer_id', null, -1, '/'); 
      return true;
    } else {
      return false;
    }
  }

}