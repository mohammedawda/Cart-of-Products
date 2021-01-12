<?php

//class items that putting the prices for each product depending on the desired currency//
class items{

    public $t_shirt;
    public $pants;
    public $jacket;
    public $shoes;

    function __construct($t_shirt, $pants, $jacket, $shoes){
        $this->t_shirt = $t_shirt;
        $this->pants = $pants;
        $this->jacket = $jacket;
        $this->shoes = $shoes;
    }
}