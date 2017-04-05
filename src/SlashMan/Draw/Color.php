<?php

namespace SlashMan\Draw;

class Color
{
    private $hex;
    
    public function __construct(string $hex)
    {
        $this->hex = $hex;
    }
    
    public function getHex() : string 
    {
        return $this->hex;
    }

    public static function black()
    {
        return new self('000000');
    }

    public static function white()
    {
        return new self('FFFFFF');
    }
}