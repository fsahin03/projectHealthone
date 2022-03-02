<?php
class Review
{
public $id;
public $name;
public $description;
public $stars;
public $product_id;
public $user_id;

    public function __construct()
    {
        settype($this->id,'integer');
    }
}
?>