<?php
require 'vendor/autoload.php';

use classes\Math\Calculator;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;

$num = new Calculator();
$num->setNum(4);
echo $num->getNum();

$log = new Logger('name');
$log->pushHandler(new StreamHandler('test.log', Level::Warning));

$log->warning('Foo');
$log->error('Bar');
