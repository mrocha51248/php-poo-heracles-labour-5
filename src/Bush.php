<?php

namespace App;

use App\Hind;
use App\Tile;

class Bush extends Tile
{
    public function __construct(int $x, int $y)
    {
        parent::__construct($x, $y, "bush.png");
        $this->setCrossable(false);
    }

    public function isCrossable(Movable $movable): bool
    {
        return $movable instanceof Hind ? true : parent::isCrossable($movable);
    }
}
