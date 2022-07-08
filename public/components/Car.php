<?php

namespace app\components;

class Car
{
    public string $brend;
    public string $serialnumber;
    private Engine $engine;
    public function __construct()
    {
        $this->engine = new Engine();
    }

    public function startEngine()
    {
        $this->engine->start();
    }
}// Завод оп изготовлению танков, создать корпус, башню, пушку и получить танк