<?php
namespace classes\Math;

class Calculator{

    private $num;

    public function setNum($n){
        $this->num = $n;
    }
    public function getNum(){
        echo $this->num;
    }

}