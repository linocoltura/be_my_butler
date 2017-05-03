<?php

class Drink
{
    private $name;
    private $price;

    public function getAllDrinks() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM drinks");
        $statement->execute();
        return $statement->fetchAll();
    }


}