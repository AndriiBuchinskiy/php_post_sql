<?php

namespace Palmo\backend\valid;
use Palmo\backend\DataBase;

class Sex extends Validator
{
    private $sex;


    public function __construct($sex)
    {
        $this->sex = $sex;

    }

    public function validate()
     {
         if($this->sex !== "male" && $this->sex !== "female")
         {
             return  ['type' => "sex", 'message' => "Оберіть стать"];
         }

     }
}