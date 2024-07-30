<?php
include_once 'header.php';
include_once 'data_base.php';
include_once 'my-functions.php';
include_once 'ItemClasse.php';


class OriginProduct extends Item{
    private string $origine;

    public function __construct(array $product)
    {
        $this->origine=$product['origine'];
        parent::__construct($product);          //on fait en sorte que l'enfant (qui hérite de Item) hérite aussi de ce qui est défini dans le constructeur de son parent
    }

    public function getOrigine() {
        return $this->origine;
    }
}



