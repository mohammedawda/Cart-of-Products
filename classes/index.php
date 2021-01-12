<?php

include 'products.php';
include 'items.php';
include 'billing.php';
include 'currency.php';


//read input from user//
$userInput = explode(' ', readline());


//get the list of products only that the user need to buy//
$cartOfproducts = new products();
$finaLList = $cartOfproducts->get_products($userInput);


//get the currency that the user want to buy with// 
$Currency = new currency();
//hint: the following variable have two strings only[word'currency', the desired currency]//
$getCurrency = explode('=', $userInput[1]);
$currencBy = $Currency->get_currency($getCurrency);


$shoesOffer = $jacketOffer = 0;


//send to class items the price of each product with the currency that the user specify[we can add more conditions here with every currency]//
if($currencBy == "EGP"){
    $item = new items(10.99, 14.99, 19.99, 24.99);
}


//make all characters in all strings in finallist small to handle the accidente that may happen in input//
for($i = 0;$i < count($finaLList);$i++){
    $finaLList[$i] = strtolower($finaLList[$i]);

    //check the number of t-shirts to decide if we can apply the t-shirts offer or not//
    if($finaLList[$i] == "t-shirt"){
        $jacketOffer++;
    }
    
    //check the number of shoes to decide if we can apply the shoes offer or not//
    if($finaLList[$i] == "shoes"){
        $shoesOffer++;
    }
}


$subtotalSheique = new billing();


//calculate the total sum of products that user want to buy//
$totalsum = $subtotalSheique->subtotal($finaLList, $item->t_shirt, $item->pants, $item->jacket, $item->shoes);
echo "Subtotal: " . $totalsum . '         ';


//add taxes// 
$taxes = $subtotalSheique->taxes($totalsum);
echo "Taxes: " . $taxes . '         ';
$totalsum += $taxes;


//apply offers if founded//
if($shoesOffer >=1 || $jacketOffer >= 2){
    echo 'Discounts: ';
    
    if($shoesOffer >= 1){
        $shoesDiscount = $subtotalSheique->shoes_offers($item->shoes);
        $totalsum += $shoesDiscount;
        echo '10% off shoes: ' . $shoesDiscount . '      ';
    }
    
    if($jacketOffer >= 2){
        $jacketDiscount = $subtotalSheique->jacket_offers($item->jacket);
        $totalsum += $jacketDiscount;
        echo '50% off shoes: ' . $jacketDiscount . '      ';
    }
}


//display the final receipt to the user//
echo 'Total: ' . $totalsum;