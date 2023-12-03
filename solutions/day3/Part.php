<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Part
{
    public function __construct(
        public readonly int $y,
        public readonly ?int $xStart,
        public readonly ?int $xEnd,
        public readonly ?string $number,
    ) {}

    // [2]
    public function isClose(int $x, int $y): bool
    {
        // On vérifie y déjà pour éviter trop de controles
        // Il faut que $this->y soit compris entre y - 1 et y + 1
        $condition = ($this->y <= $y + 1 && $this->y >= $y - 1);
        if (! $condition) {
            return false;
        }
        // --------------------------------------------------------

        // On construit les 2 ranges de coordonnées
        $coordinatesElement = [];
        $coordinatesPart = [];

        // Pour l'élément on repart de bottomLeft vers TopRight
        $yBottomLeft = $y - 1;
        $xBottomLeft = $x - 1;

        $yTopRight = $y + 1;
        $xBottomRight = $x + 1;

        for ($x = $xBottomLeft; $x <= $xBottomRight; $x++) {
            for ($y = $yBottomLeft; $y <= $yTopRight; $y++) {
                $coordinates = "$x.$y";
                $coordinatesElement[] = $coordinates;
            }
        }

        // y ne varie pas
        for ($x = $this->xStart; $x <= $this->xEnd; $x++) {
            $coordinates = "$x.$this->y";
            $coordinatesPart[] = $coordinates;
        }

        return count(array_intersect($coordinatesElement, $coordinatesPart)) > 0;
    }
}