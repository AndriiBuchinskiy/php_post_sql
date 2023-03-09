<?php

namespace Palmo\backend\valid;

use Palmo\backend\DataBase;
class Login extends Validator
{
    private DataBase $db;
    private $login;
  public function __construct($login,$db)
  {
      $this->login = $login;
      $this->db = $db;
  }

    public function validate()
    {
        $requestLogin = $this->db->query("Select login From users WHERE login = '$this->login'");
        if(empty($this->login)  || strlen($this->login) < 3 || strlen($this->login) > 20){
            return ['type' => "login", 'message' => "Логін повинен бути не меншим 3-х символів та не більшим за 20 символів "];
        }
        if(!empty($requestLogin))
        {
            return ['type' => "login", 'message' => "Такий логін уже існує"];
        }
    }
}