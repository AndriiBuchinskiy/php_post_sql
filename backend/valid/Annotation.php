<?php

namespace Palmo\backend\valid;

class Annotation extends Validator
{
    private  $annotaion;

    public function __construct($annotaion)
    {
        $this->annotaion = $annotaion;
    }

    public function validate()
    {
        if(strlen($this->annotaion) > 50){
            return ['type' => "annotation", 'message' => "Аннотація не повинна перевищувати 50 символів"];
        }

    }
}