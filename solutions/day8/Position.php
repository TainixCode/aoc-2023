<?php
declare(strict_types=1);

namespace Solutions\Day8;

class Position
{
    public int $iteration = 0;

    public function __construct(
        public string $position,
    ) { }

    public function next(Path $path, string $direction)
    {
        $this->position = $path->get($direction);
        $this->iteration++;
    }

    public function isArrived(): bool
    {
        return substr($this->position, -1) === 'Z';
    }
}