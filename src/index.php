<?php

ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);
//Прошу прощения за это

include_once('SlashMan/Draw/Canvas/CanvasInterface.php');
include_once('SlashMan/Draw/Canvas/ASCIIArtCanvas.php');
include_once('SlashMan/Draw/CanvasMapper/CanvasMapperInterface.php');
include_once('SlashMan/Draw/CanvasMapper/ArrayCanvas/CircleMapper.php');
include_once('SlashMan/Draw/CanvasMapper/ArrayCanvas/SquareMapper.php');
include_once('SlashMan/Draw/Shape/AbstractShape.php');
include_once('SlashMan/Draw/Shape/Circle.php');
include_once('SlashMan/Draw/Shape/Square.php');
include_once('SlashMan/Draw/CanvasEditor.php');
include_once('SlashMan/Draw/Color.php');

//Конфиг рисовалки

$config = [
    \SlashMan\Draw\Canvas\ASCIIArtCanvas::class => [
        \SlashMan\Draw\Shape\Circle::class => \SlashMan\Draw\CanvasMapper\ArrayCanvas\CircleMapper::class,
        \SlashMan\Draw\Shape\Square::class => \SlashMan\Draw\CanvasMapper\ArrayCanvas\SquareMapper::class,
    ],
];

// Допустим есть у нас запрос от пользователя, мы его распарсили и получили массив:

$shapes = [
    [
        'type'   => 'circle',
        'x'      => 1,
        'y'      => 1,
        'radius' => 5,
        'color'  => 'FF0000',
    ],
    [
        'type'       => 'square',
        'x'          => 2,
        'y'          => 2,
        'edgeLength' => 3,
        'color'      => '00FF00',
        'border'     => 2,
    ],
    [
        'type'       => 'square',
        'x'          => 10,
        'y'          => 10,
        'edgeLength' => 3,
        'color'      => '00FF00',
        'border'     => 2,
    ],
];


foreach($shapes as &$shape) {
    $shape = \SlashMan\Draw\Shape\AbstractShape::shapeFactory($shape);
}

$canvasEditor = new \SlashMan\Draw\CanvasEditor($config);
$canvas = new SlashMan\Draw\Canvas\ASCIIArtCanvas(100,100);

$canvasEditor->drawShapes($canvas, $shapes);


echo $canvas->render();

