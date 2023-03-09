<?php

namespace Palmo\backend\valid;

use Palmo\backend\DataBase;

class CheckPassword extends Validator
{
    private $checkPass;
    private $password;
    public function __construct($checkPass,$password)
    {
        $this->checkPass = $checkPass;
        $this->password = $password;
    }
  public function validate()
  {
      if(empty($this->password) && empty($this->checkPass))
      {
          return ['type' => "checkPass", 'message' => "Паролі не повинні бути пустими"];
      }
     if($this->password !== $this->checkPass )
     {
          return ['type' => "checkPass", 'message' => "Паролі не співпадають"];
     }
  }
}