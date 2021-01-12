<?php

//class products that collect the desired products from the user input//
class products{    
    
    private $listOfproducts = array();

    public function get_products($userInput){
        $index_L_P = 0;
        
        //loop from third position where first product defined//
        for($i = 2;$i < count($userInput);$i++){
            
            //add each product to separated array that contain products only//
            $this->listOfproducts[$index_L_P] = $userInput[$i];
            $index_L_P++;
        }
        return $this->listOfproducts;
    }  
}