<?php
    include_once 'data_base.php';


class Cart {

    private array $productQuantity;


    public function __construct(){
        $this->productQuantity=[];
        
    }
    
    public function add($key, $value){
                $_SESSION[$key] = 0;
                $this->productQuantity=$_SESSION;
    
    }
    

    public function update($idProduct){
        if(isset($this->productQuantity[$idProduct])){
            $this->productQuantity[$idProduct]+=1;
            return $this->productQuantity[$idProduct];
        }
    }

    public function delete($idProduct){
        if($this->productQuantity[$idProduct]=0){
            unset($this->productQuantity[$idProduct]);
        }
        
    }

    public function getProductQuantity(){
        return $this->productQuantity;
    }

}
