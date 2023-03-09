<?php

namespace Palmo\backend\valid;

class PhoneNumber extends Validator
{

    private $phoneNumber;

    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function validate()
    {

        $this->phoneNumber = preg_replace('/\D/', '', $this->phoneNumber);

        if (!str_starts_with($this->phoneNumber, '380') || strlen($this->phoneNumber) !== 12 )  {
            return ['type' => "phNumber", 'message' => "Телефон має починатись з 380"];
        }

    }

}