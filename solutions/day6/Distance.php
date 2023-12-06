<?php
declare(strict_types=1);

namespace Solutions\Day6;

class Distance
{
    public static function calcul(int $duration, int $hold): int|false
    {
        if ($hold > $duration) {
            return false;
        }

        return $hold * ($duration - $hold);
    }
}