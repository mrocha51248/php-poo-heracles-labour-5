<?php

namespace App;

use App\Movable;
use Exception;

class Arena
{
    public const DIRECTIONS = [
        'N' => [0, -1],
        'S' => [0, 1],
        'E' => [1, 0],
        'W' => [-1, 0],
    ];

    private array $monsters;
    private Hero $hero;
    private array $tiles;

    private int $size = 10;

    public function __construct(Hero $hero, array $monsters, array $tiles = [])
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
        $this->tiles = $tiles;
    }

    public function arenaMove(string $destination): void
    {
        $this->move($this->getHero(), $destination);
        foreach ($this->getMonsters() as $monster) {
            if ($monster instanceof Movable) {
                $this->move($monster, array_rand(self::DIRECTIONS));
            }
        }
    }

    public function move(Movable $movable, string $direction)
    {
        $x = $movable->getX();
        $y = $movable->getY();
        if (!key_exists($direction, self::DIRECTIONS)) {
            throw new Exception('Unknown direction');
        }

        $destinationX = $x + self::DIRECTIONS[$direction][0];
        $destinationY = $y + self::DIRECTIONS[$direction][1];

        if ($destinationX < 0 || $destinationX >= $this->getSize() || $destinationY < 0 || $destinationY >= $this->getSize()) {
            throw new Exception('Out of Map');
        }

        foreach ($this->getMonsters() as $monster) {
            if ($monster->getX() == $destinationX && $monster->getY() == $destinationY) {
                throw new Exception('Not free');
            }
        }

        $tile = $this->getTile($destinationX, $destinationY);
        if ($tile && !$tile->isCrossable($movable)) {
            throw new Exception('Not crossable');
        }

        $movable->setX($destinationX);
        $movable->setY($destinationY);
    }

    public function getDistance(Fighter $startFighter, Fighter $endFighter): float
    {
        $Xdistance = $endFighter->getX() - $startFighter->getX();
        $Ydistance = $endFighter->getY() - $startFighter->getY();
        return sqrt($Xdistance ** 2 + $Ydistance ** 2);
    }

    public function battle(int $id): void
    {
        $monster = $this->getMonsters()[$id];
        if ($this->touchable($this->getHero(), $monster)) {
            $this->getHero()->fight($monster);
        } else {
            throw new Exception('Monster out of range');
        }

        if (!$monster->isAlive()) {
            $this->getHero()->setExperience($this->getHero()->getExperience() + $monster->getExperience());
            unset($this->monsters[$id]);
        } else {
            if ($this->touchable($monster, $this->getHero())) {
                $monster->fight($this->getHero());
            } else {
                throw new Exception('Hero out of range');
            }
        }
    }

    public function touchable(Fighter $attacker, Fighter $defenser): bool
    {
        return $this->getDistance($attacker, $defenser) <= $attacker->getRange();
    }

    public function getTile(int $x, int $y): ?Tile
    {
        foreach ($this->getTiles() as $tile) {
            if ($tile->getX() === $x && $tile->getY() === $y) {
                return $tile;
            }
        }
        return null;
    }

    /**
     * Get the value of monsters
     */
    public function getMonsters(): array
    {
        return $this->monsters;
    }

    /**
     * Set the value of monsters
     *
     */
    public function setMonsters($monsters): void
    {
        $this->monsters = $monsters;
    }

    /**
     * Get the value of hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     */
    public function setHero($hero): void
    {
        $this->hero = $hero;
    }

    /**
     * Get the value of size
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Get the value of tiles
     *
     * @return array
     */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    /**
     * Set the value of tiles
     *
     * @param array $tiles
     *
     * @return self
     */
    public function setTiles(array $tiles): self
    {
        $this->tiles = $tiles;

        return $this;
    }
}
