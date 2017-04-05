<?php

namespace SlashMan\Draw\CanvasMapper\ArrayCanvas;

use SlashMan\Draw\Canvas\ASCIIArtCanvas;
use SlashMan\Draw\Canvas\CanvasInterface;
use SlashMan\Draw\Shape\AbstractShape;
use SlashMan\Draw\CanvasMapper\CanvasMapperInterface;
use SlashMan\Draw\Shape\Square;

class SquareMapper implements CanvasMapperInterface
{
    public function map(AbstractShape $shape, CanvasInterface $canvas) : CanvasInterface
    {
        if(!$shape instanceof Square) {
            throw new \InvalidArgumentException('This mapper can map only Squares');
        }
        if(!$canvas instanceof ASCIIArtCanvas) {
            throw new \InvalidArgumentException('This mapper can only map to ASCIIArtCanvas');
        }
        
        //Установим некоторые пиксели холста в цвет фигуры (само рисование не реализовано)
        $canvas->setPixel($shape->getX() + 10, $shape->getY() + 10, $shape->getColor());
        $canvas->setPixel($shape->getX() + 11, $shape->getY() + 10, $shape->getColor());
        $canvas->setPixel($shape->getX() + 11, $shape->getY() + 11, $shape->getColor());
        $canvas->setPixel($shape->getX() + 10, $shape->getY() + 11, $shape->getColor());

        return $canvas;
    }
}