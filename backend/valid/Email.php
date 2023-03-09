<?php

namespace Palmo\backend\valid;

use Palmo\backend\DataBase;

class Email extends Validator
{
    private $email;
    private DataBase $db;

    public function __construct($email, $db)
    {
        $this->email = $email;
        $this->db = $db;
    }

    public function validate()
    {
        $regExpEmail = '/^[a-zA-Z0-9-_\.]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/';
        $requestEmail = $this->db->query("Select email From users Where email = '$this->email'");
        if (!preg_match($regExpEmail, $this->email)) {
            return ['type' => "email", 'message' => "Incorrect email"];
        }
        if (!empty($requestEmail)) {
            return ['type' => "email", 'message' => "Email exist"];
        }
    }
}