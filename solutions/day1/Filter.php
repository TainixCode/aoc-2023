<?php
declare(strict_types=1);

namespace Solutions\Day1;

class Filter
{
    public static function keepDigits(string $value): string|false
    {
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function turnToNumber(string $value): int
    {
        $digits = self::keepDigits($value);

        $result = '0'; // Le zéro devant ne changera pas la valeur numérique finale
        $result .= $digits[0] ?? '';
        $result .= $digits[-1] ?? '';

        return (int) $result;
    }

    public static function findDigit(string $string): ?string
    {
        $search = [
            'one' => '1',
            'two' => '2',
            'three' => '3',
            'four' => '4',
            'five' => '5',
            'six' => '6',
            'seven' => '7',
            'eight' => '8',
            'nine' => '9'
        ];

        foreach ($search as $number => $digit) {
            if (strpos($string, $number) === 0) {
                return $digit;
            }
        }

        return null;
    }
}