<?php

namespace SlashMan\Draw\CanvasMapper;

use SlashMan\Draw\Canvas\CanvasInterface;
use SlashMan\Draw\Shape\AbstractShape;

interface CanvasMapperInterface
{
    public function map(AbstractShape $shape, CanvasInterface $canvas) : CanvasInterface;
}