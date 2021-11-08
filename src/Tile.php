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
     * @return self
     */
    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
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
     * @return self
     */
    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
