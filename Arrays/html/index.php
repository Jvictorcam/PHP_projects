<?php
$numbers = [1, 2, 3, 4, 5];

function sum($subtotal, $item){
    $subtotal+=$item;
    return $subtotal;
}

$total = array_reduce($numbers, 'sum');

echo $total;
