<?php
declare(strict_types=1);

namespace Utils;

class Utils
{
    /**
     * @param array<int, mixed> $array
     */
    public static function sum(array $array, callable $callable): int
    {
        return array_reduce($array, function ($carry, $item) use ($callable) {
            return $carry + $callable($item);
        }, 0); // Initialise $carry à 0.
    }
}