<?php
declare(strict_types=1);

namespace Solutions\Day7;

abstract class HandCalculator
{
    public const FIGURES = [
        'T' => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 15,
    ];

    public const C_NOTHING = 1;
    public const C_1_PAIR = 2;
    public const C_2_PAIRS = 3;
    public const C_THREE = 4;
    public const C_FULL = 5;
    public const C_QUADS = 6;
    public const C_POKER = 7;
}