<?php
declare(strict_types=1);

namespace Solutions\Day8;

class Path
{
    public function __construct(
        public readonly string $left,
        public readonly string $right
    ) {}

    public function get(string $move): string
    {
        if ($move === 'L') {
            return $this->left;
        }

        return $this->right;
    }
}