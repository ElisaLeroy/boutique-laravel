<?php

include_once 'clientclasse.php';

//permet d'aller checher toutes les lignes de la table customers (bdd)

class ClientsList{

    private array $clients;

    public function __construct( array $data = [])
    {
        $this->clients=[];
        $this->transformToObject($data);
    }

    public function transformToObject(array $data){
        foreach($data as $var){
            $this->clients[]=new client($var);
        }
    }

    public function getClients(){
        return $this->clients;
    }

}