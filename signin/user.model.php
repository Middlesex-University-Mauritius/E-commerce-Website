<?php

// Store user for mongodb later
class User
{
  public $firstName;
  public $lastName;
  public $age;
  public $phone;
  public $password;
  public $confirmPassword;

  public function __construct(string $firstName, string $lastName, int $age, int $phone, string $password, string $confirmPassword)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->age = $age;
    $this->phone = $phone;
    $this->password = $password;
    $this->confirmPassword = $confirmPassword;
  }

  public function getFirstName()
  {
    return $this->firstName;
  }
}
