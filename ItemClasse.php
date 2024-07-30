<?php

class Item{
    private string $name;
    private string $description;
    private float $price;
    private string $imageUrl;
    private float $weight;
    private int $productID;

    public function __construct(array $product)           //on créé un constructeur qui prend en paramètre un tableau qui permettra de remplir les données des articles, vu que c'est le construct : il faudra renseigné ce paramètre lors de l'instanciation de lobjet avec cette classe
    {
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->imageUrl = $product['image_url'];
        $this->weight = $product['weight'];
        $this->productID = $product['id'];
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getWeight() {
        return $this->weight;
    }
    public function getProductId() {
        return $this->productID;
    }
}







