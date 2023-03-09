<?php

namespace Palmo\backend\valid;

class Date extends Validator
{
    private  $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function validate()
    {
        if( $this->date > date('Y-m-d') || empty($this->date)){
            return ['type' => "date", 'message' => "Некоректна дата"];
        }

    }
}