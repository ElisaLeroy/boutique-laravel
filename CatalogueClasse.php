<?php
include_once 'header.php';
include_once 'data_base.php';
include_once 'my-functions.php';
include_once 'ItemClasse.php';
include_once 'originProductClass.php';


class Catalogue{

    private array $items = [];   //tableau d'objets item qui prendra pour valeur la table de la db


    public function __construct(array $data = [])     //on demande en paramètre du constructeur un taleau, qu'on initialise en vide ("à zéro") 
    {
        $this->transformToObject($data);
    }

    public function transformToObject(array $data){
        foreach($data as $var){
            $this->items[] = new OriginProduct($var);
        }
    }

    public function getItems(){
        return $this->items;
    }


}



