<?php

include "user.model.php";


$firstName = $_POST["firstName"] ?? null;
$lastName = $_POST["lastName"] ?? null;
$age = $_POST["age"] ?? null;
$phone = $_POST["phone"] ?? null;
$password = $_POST["password"] ?? null;
$confirmPassword = $_POST["confirmPassword"] ?? null;

// Handle login
if ($firstName && $lastName && $age && $phone && $password && $confirmPassword) {
  $user = new User($firstName, $lastName, (int)$age, (int)$phone, $password, $confirmPassword);
}

echo "Hello World";
