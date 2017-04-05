<?php

namespace SlashMan\Draw\Shape;

use SlashMan\Draw\Color;

class Circle extends AbstractShape
{
    private $radius;
    
    public function __construct(float $radius, int $x, int $y)
    {
        $this->radius = $radius;
        $this->x = $x;
        $this->y = $y;
        
        $this->color = Color::black();
    }
}