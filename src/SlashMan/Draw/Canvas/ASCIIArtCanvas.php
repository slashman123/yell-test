<?php

namespace SlashMan\Draw\Canvas;

use SlashMan\Draw\Color;

class ASCIIArtCanvas implements CanvasInterface
{
    private $width;

    private $height;

    private $canvas;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->canvas = array_fill(1, $width, array_fill(1, $height, Color::white()));
    }

    public function setPixel(int $x, int $y, Color $color)
    {
        $this->canvas[$x][$y] = $color;
    }

    public function getName() : string 
    {
        return self::class;
    }
    
    public function getPixel(int $x, int $y) : Color
    {
        return $this->canvas[$x][$y];
    }

    public function render()
    {
        $result = '';

        for($col = 1; $col <= $this->width; $col++) {
            for($row = 1; $row <= $this->height; $row++) {
                $result .= $this->getPixel($col, $row)->getHex() === 'FFFFFF' ? 'o' : 'O';
            }
            $result .= PHP_EOL;
        }

        return $result;
    }
}