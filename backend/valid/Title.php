<?php

namespace Palmo\backend\valid;

use Palmo\backend\DataBase;

class Title extends Validator
{
    private $title;
    private DataBase $db;

    public function __construct($title,$db)
    {
        $this->title = $title;
        $this->db = $db;
    }
    public function validate()
    {
        $requestTitle = $this->db->query("Select title From posts WHERE title = '$this->title'");
        if(!empty($requestTitle))
        {
            return  ['type' => "title", 'message' => "Така назва поста існує"];
        }
        if(empty($this->title)  || strlen($this->title) < 3 || strlen($this->title) > 50){
            return ['type' => "title", 'message' => "Довжина не повинна перевищувати 50 символів та не менше 3"];
        }

    }
}