<?php

//class billing that calculate the total receipt
class billing{

    private $subTotal;
    private $taxes;
    private $t_shirtsDiscount;
    private $shoesDiscount;

    function __construct(){
        $this->subTotal = $this->taxes = $this->t_shirtsDiscount = $this->shoesDiscount = 0;
    }

    //subtotal function that calculate the sum of all prices for each product in the list of products//
    public function subtotal($listOfproducts, $t_shirt, $pants, $jacket, $shoes){
        
        for($i = 0;$i < count($listOfproducts);$i++){
            
            if($listOfproducts[$i] == "t-shirt"){
                $this->subTotal += $t_shirt;
            }

            else if($listOfproducts[$i] == "pants"){
                $this->subTotal += $pants;
            }

            else if($listOfproducts[$i] == "jacket"){
                $this->subTotal += $jacket;
            }
            else if($listOfproducts[$i] == "shoes"){
                $this->subTotal += $shoes;
            }
        }
        
        return $this->subTotal;
    }

    //taxes function that added taxes on the receipt//
    public function taxes($subTotal){   
        $this->taxes = $subTotal * 0.14;
        return $this->taxes;
    }

    //jacket_offers function that apply jacket offer
    public function jacket_offers($jacket){
        return $jacket * -0.50;
    }  

    //shoes_offers function that apply jacket offer
    public function shoes_offers($shoes){
        return $shoes * -0.10;
    }
}