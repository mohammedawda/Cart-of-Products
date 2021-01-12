<?php

//class currency that get the desired currency from the user input//
class currency{

    private $currency;
    
    public function get_currency($getcurrency){

        //get currency from second position in the user input//
        $this->currency = $getcurrency[1];
        return $this->currency;
    }
}