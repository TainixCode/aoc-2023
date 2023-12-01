<?php

namespace Data;

class Reader
{
    public const SAMPLE = 'sample';
    public const DATA = 'data';

    public static function getDataForDay(int $day, string $filename = self::DATA): array
    {
        $result = [];

        $file = fopen('./data/day' . $day . '/'. $filename .'.txt', 'r');

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