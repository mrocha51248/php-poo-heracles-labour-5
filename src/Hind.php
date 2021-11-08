<?php

namespace App;

use App\Monster;
use App\Movable;

class Hind extends Monster implements Movable
{
    protected string $image = 'hind.svg';
}
