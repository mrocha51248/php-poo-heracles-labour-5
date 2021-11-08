<?php

namespace App;

use App\Mappable;

class Tile implements Mappable
{
    private int $x;
    private int $y;
    private string $image;

    /**
     * Get the value of x
     *
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * Set the value of x
     *
     * @param int $x
     *
     * @return void
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * Get the value of y
     *
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * Set the value of y
     *
     * @param int $y
     *
     * @return void
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return void
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
