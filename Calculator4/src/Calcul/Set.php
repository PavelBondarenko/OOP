<?php

namespace Calcul;

trait  Set
{
    private $a;
    private $b;

    public  function  set(int $a)
    {
        $this->a = $a;
    }

    public function add(int $b)
    {
        $this->b = $b + $this->a;
    }

    public  function  get()
    {
        return $this->b;
    }
}