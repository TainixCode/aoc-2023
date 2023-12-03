<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Gear
{
    public const SYMBOL = '*';
    
    public function __construct(
        public readonly int $x,
        public readonly int $y,
    ) {}
}