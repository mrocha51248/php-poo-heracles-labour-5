<?php

namespace App;

use App\Mappable;
use App\Movable;

abstract class Tile implements Mappable
{
    private int $x;
    private int $y;
    private string $image;
    private bool $crossable = true;

    public function __construct(int $x, int $y, string $image = "")
    {
        $this->setX($x);
        $this->setY($y);
        $this->setImage($image);
    }

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

    /**
     * Get the value of crossable
     *
     * @return bool
     */
    public function isCrossable(Movable $movable): bool
    {
        return $this->crossable;
    }

    /**
     * Set the value of crossable
     *
     * @param bool $crossable
     *
     * @return self
     */
    public function setCrossable(bool $crossable): self
    {
        $this->crossable = $crossable;

        return $this;
    }
}
