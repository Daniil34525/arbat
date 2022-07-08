<?php

namespace app\components;
class Engine
{
    public string $name;
    public int $number;
    public function start()
    {
        return print_r('Start engin');
    }
}