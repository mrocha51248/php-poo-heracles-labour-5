<?php

namespace App;

use App\Tile;

class Bush extends Tile
{
    public function __construct(int $x, int $y)
    {
        parent::__construct($x, $y, "bush.png");
        $this->setCrossable(false);
    }
}
