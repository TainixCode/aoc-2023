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

        $informations = explode(', ', $informations);

        // Initialisation
        $blue = 0;
        $green = 0;
        $red = 0;

        foreach ($informations as $valueAndColor) {
            $value = explode(' ', $valueAndColor)[0];
            $color = explode(' ', $valueAndColor)[1];

            $$color = (int) $value;
        }

        return new self($blue, $green, $red);
    }
}