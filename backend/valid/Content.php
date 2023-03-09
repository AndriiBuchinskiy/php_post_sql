<?php

namespace Palmo\backend\valid;

class Content extends Validator
{
    private  $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function validate()
    {
        if(strlen($this->content) > 50 ){
            return ['type' => "content", 'message' => "Довжина не повинна перевищувати 50 символів"];
        }

    }
}