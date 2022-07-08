<?php

namespace app\components;

class Tank extends TankBuilder
{
    public string $bases;
    public string $tower;
    public string $gun;
    public function __construct()
    {

    }

    public function base($newbase)
    {
        $this->bases = $newbase;
    }
    public function tower($newtower)
    {
        $this->tower = $newtower;
    }
    public function gun($newgun)
    {
        $this->gun = $newgun;
    }
    public function part()
    {
        return $this->bases . ' ' . $this->tower . ' ' . $this->gun;
    }
}