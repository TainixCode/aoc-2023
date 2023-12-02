<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Round
{
    public function __construct(
        public readonly int $blue = 0,
        public readonly int $green = 0,
        public readonly int $red = 0,
    ) { }

    public static function createFromText(string $informations): Round
    {
        $informations = trim($informations);

        // Initialisation
        $blue = 0;
        $green = 0;
        $red = 0;

        preg_match_all('/(\d+)\s*(blue|green|red)/', $informations, $matches);

        foreach ($matches[2] as $index => $color) {
            $$color = (int) $matches[1][$index];
        }

        return new self($blue, $green, $red);
    }
}