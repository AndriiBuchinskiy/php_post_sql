<?php

namespace Palmo\backend\valid;

class City extends Validator
{
    private $city;


    public function __construct($city)
    {
        $this->city = $city;

    }

    public function validate()
    {
        if (strlen($this->city) <=1 || strlen($this->city) >= 20) {
            return ['type' => "city", 'message' => "Некоректна назва міста"];
        }

    }
}