<?php

namespace SlashMan\Draw\Shape;

use SlashMan\Draw\Color;

abstract class AbstractShape
{
    protected $x;

    protected $y;

    protected $border = 1;

    protected $color;

    public static function shapeFactory(array $parameters) : AbstractShape
    {
        switch($parameters['type']) {
            case 'circle': 
                $shape = new Circle($parameters['radius'], $parameters['x'], $parameters['y']);
                break;
            case 'square':
                $shape = new Square($parameters['edgeLength'], $parameters['x'], $parameters['y']);
                break;
            default:
                throw new \InvalidArgumentException('Unknown shape type: ' . $parameters['type']);
        }
        
        if(isset($parameters['color'])) {
            $shape->setColor(new Color($parameters['color']));
        }
        
        if(isset($parameters['border'])) {
            $shape->setBorder($parameters['border']);
        }
        
        return $shape;
    }


    public function getX() : int
    {
        return $this->x;
    }

    public function getY() : int
    {
        return $this->y;
    }

    public function getBorder() : int
    {
        return $this->border;
    }

    public function setBorder(int $border)
    {
        $this->border = $border;
    }

    public function getColor() : Color
    {
        return $this->color;
    }

    public function setColor(Color $color)
    {
        $this->color = $color;
    }
    
    public function getName() : string
    {
        return static::class;
    }
}