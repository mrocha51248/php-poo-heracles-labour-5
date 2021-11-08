<?php

namespace App;

interface Mappable
{
    public function getX(): int;
    public function setX(int $x): self;
    public function getY(): int;
    public function setY(int $y): self;
    public function getImage(): string;
    public function setImage(string $image): self;
}
