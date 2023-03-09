<?php

namespace Palmo\backend\valid;

use Palmo\backend\DataBase;

class Password extends Validator
{
    private $password;


    public function __construct($password)
    {
        $this->password = $password;
    }

  public function validate()
  {
      if (strlen($this->password) < 8) {
           return ['type' => "password", 'message' => "Пароль має бути більше 8 символів"];
      }

      // перевіряємо, чи пароль містить принаймні одну велику і одну малу літери
      if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password)) {
          return ['type' => "password", 'message' => "Пароль має містити принаймні одну велику і одну малу літери"];
      }


  }
}