<?php
declare(strict_types=1);

namespace Data;

class Reader
{
    public const SAMPLE = 'sample';
    public const DATA = 'data';

    /**
     * @return array<int, string|null>
     */
    public static function getDataForDay(int $day, string $filename = self::DATA): array
    {
        $result = [];

        $file = fopen('./data/day' . $day . '/'. $filename .'.txt', 'r');

        if (! $file) {
            return [];
        }

        while ($line = fgets($file)) {

            $line = trim($line);

            if ($line === '') {
                $line = null;
            }

            $result[] = $line;
        }

        return $result;
    }
}

// $data = Reader::getDataForDay(1);