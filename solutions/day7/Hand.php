<?php
declare(strict_types=1);

namespace Solutions\Day7;

class Hand
{
    public function __construct(
        public readonly string $cards,
        public readonly int $bid,
    ) {}

    public static function createFromText(string $informations): Hand
    {
        [$cards, $bid] = explode(' ', $informations);
        return new self($cards, (int) $bid);
    }
}