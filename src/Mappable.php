<?php

namespace App;

interface Mappable
{
    public function getX(): int;
    public function setX(int $x): void;
    public function getY(): int;
    public function setY(int $y): void;
    public function getImage(): string;
    public function setImage(string $image): void;
}
