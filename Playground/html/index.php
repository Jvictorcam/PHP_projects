<?php
require 'autoload.php';
use \math\Calculator;

$calc = new Calculator();

$calc->add(4);
echo $calc->total();
