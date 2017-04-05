<?php

namespace SlashMan\Draw;

use SlashMan\Draw\Canvas\CanvasInterface;
use SlashMan\Draw\CanvasMapper\CanvasMapperInterface;
use SlashMan\Draw\Shape\AbstractShape;

class CanvasEditor
{
    private $config;

    private $canvasMappers;

    /**
     * Массив классов, отвечающих за логику отрисовки конкретного объекта на конкретном холсте (массив, изображение)
     * Можно хранить в конфиге и инжектить из него сюда
     * 
     * @param array $canvasMappers
     */
    public function __construct(array $canvasMappers)
    {
        $this->config = $canvasMappers;
    }

    private function initializeCanvasMapper(string $canvasName, string $shapeName) : CanvasMapperInterface
    {
        if(!isset($this->config[$canvasName][$shapeName])) {
            throw new \InvalidArgumentException(
                sprintf('No mapper found to draw %s on canvas %s', $shapeName, $canvasName)
            );
        }

        $canvasMapperClassName = $this->config[$canvasName][$shapeName];

        return new $canvasMapperClassName();
    }

    private function getCanvasMapper(string $canvasName, string $shapeName) : CanvasMapperInterface
    {
        if(!isset($this->canvasMappers[$canvasName][$shapeName])) {
            $this->canvasMappers[$canvasName][$shapeName] = $this->initializeCanvasMapper($canvasName, $shapeName);
        }

        return $this->canvasMappers[$canvasName][$shapeName];
    }
    
    public function drawShape(CanvasInterface $canvas, AbstractShape $shape)
    {
        $canvasMapper = $this->getCanvasMapper($canvas->getName(), $shape->getName());
        $canvasMapper->map($shape, $canvas);
    }
    
    public function drawShapes(CanvasInterface $canvas, array $shapes)
    {
        foreach ($shapes as $shape) {
            $this->drawShape($canvas, $shape);
        }
    }
}