<?php

namespace SlashMan\Draw\Canvas;

use SlashMan\Draw\Color;

interface CanvasInterface
{
    public function getName() : string;
    public function setPixel(int $x, int $y, Color $color);
}