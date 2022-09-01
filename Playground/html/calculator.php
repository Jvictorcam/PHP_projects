<?php
class Calculalator{

    private $num;
    public function __construct(){
        $this->num = 0;
    }
    public function add(float $n){
        $this->num += $n; 
    }
    public function multiply(float $n){
        $this->num *= $n;

    }
    public function divide(float $n){
        $this->num /= $n;

    }
    public function sub(float $n){
        $this->num -= $n;
    }
    public function total(){
        return $this->num;
    }
    public function clear(){
        $this->num = 0;
    }
}