<?php

namespace app\components;

class Factory
{
    private Tank $tank;
    public function __construct()
    {
        $this->tank = new Tank();
    }

//    public function createbaseTank()
//    {
//        $this->tank = new Tank();
//    }
    public function bases($bases)
    {
        $this->tank->bases = $bases;
        return $this;
    }
    public function tower($tower)
    {
        $this->tank->tower = $tower;
        return $this;
    }
    public function gun($gun)
    {
        $this->tank->gun = $gun;
        return $this;
    }
    public function create()
    {
        return print_r($this->tank->part());
    }
}