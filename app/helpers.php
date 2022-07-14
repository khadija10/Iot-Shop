<?php

function getPrice($price){

    $price = floatval($price);

    return number_format($price, 2, ',', ' '). ' CFA';
    
}

function getNumber($number){

    $number = $number;

    return number_format($number);
    
}
