<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Symbols
{
    public static function isSymbol(string $char): bool
    {
        if ($char === '.') {
            return false;
        }

        if (is_numeric($char)) {
            return false;
        }

        return true;
    }
}