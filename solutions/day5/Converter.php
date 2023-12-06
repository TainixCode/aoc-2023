<?php
declare(strict_types=1);

namespace Solutions\Day5;

class Converter
{
    public static function convert(int $value, int $destinationRange, int $sourceRange, int $rangeLength): int
    {
        // Est ce que la valeur est dans la range source ?
        if ($value >= $sourceRange && $value < $sourceRange + $rangeLength) {
            return $destinationRange + $value - $sourceRange;
        }

        return $value;
    }

    public static function convertAll(int $value, array $ranges): int
    {
        foreach ($ranges as $range) {
            $convert = self::convert($value, ...$range);

            if ($convert != $value) {
                return $convert;
            }
        }

        return $value;
    }
}