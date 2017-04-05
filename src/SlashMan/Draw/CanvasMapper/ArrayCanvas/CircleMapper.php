<?php

namespace SlashMan\Draw\CanvasMapper\ArrayCanvas;

use SlashMan\Draw\Canvas\ASCIIArtCanvas;
use SlashMan\Draw\Canvas\CanvasInterface;
use SlashMan\Draw\CanvasMapper\CanvasMapperInterface;
use SlashMan\Draw\Shape\AbstractShape;
use SlashMan\Draw\Shape\Circle;

class CircleMapper implements CanvasMapperInterface
{
    public function map(AbstractShape $shape, CanvasInterface $canvas) : CanvasInterface
    {
        if(!$shape instanceof Circle) {
            throw new \InvalidArgumentException('This mapper can map only Circles');
        }
        if(!$canvas instanceof ASCIIArtCanvas) {
            throw new \InvalidArgumentException('This mapper can only map to ASCIIArtCanvas');
        }
        
        //Установим некоторые пиксели холста в цвет фигуры (само рисование не реализовано)
        $canvas->setPixel($shape->getX() + 5, $shape->getY() + 5, $shape->getColor());
        $canvas->setPixel($shape->getX() + 6, $shape->getY() + 6, $shape->getColor());
        $canvas->setPixel($shape->getX() + 7, $shape->getY() + 7, $shape->getColor());
        $canvas->setPixel($shape->getX() + 6, $shape->getY() + 8, $shape->getColor());
        $canvas->setPixel($shape->getX() + 5, $shape->getY() + 9, $shape->getColor());
        $canvas->setPixel($shape->getX() + 4, $shape->getY() + 8, $shape->getColor());
        $canvas->setPixel($shape->getX() + 3, $shape->getY() + 7, $shape->getColor());
        $canvas->setPixel($shape->getX() + 4, $shape->getY() + 6, $shape->getColor());
        
        
        return $canvas;
    }
}