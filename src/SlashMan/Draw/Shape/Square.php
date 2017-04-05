<?php

namespace SlashMan\Draw\Shape;

use SlashMan\Draw\Color;

class Square extends AbstractShape
{
    private $edgeLength;
    
    public function __construct(float $edgeLength, int $x, int $y)
    {
        $this->edgeLength = $edgeLength;
        $this->x = $x;
        $this->y = $y;

        $this->color = Color::black();
    }
    
    public function getEdgeLength() : float
    {
        return $this->edgeLength;
    }
}