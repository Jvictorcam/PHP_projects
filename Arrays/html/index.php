<?php
$show = function(string $obj, string $separator = ' '){
    echo "$obj" . $separator;

};
$showArray = fn(array $obj) => array_map($show, $obj);


$array = range(1, 100);
$str = "testing function 1";
$show($str);

