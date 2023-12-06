<?php
declare(strict_types=1);

namespace Solutions\Day6;

class Race
{
    public function __construct(
        public readonly int $duration,
        public readonly int $record,
    ) { }

    public function getNbWaysToWin(): int
    {
        $nbWays = 0;

        $hold = 0;

        while (true) {

            $distance = Distance::calcul($this->duration, $hold);

            if ($distance === false) {
                break;
            }

            if ($distance > $this->record) {
                $nbWays++;
            }

            $hold++;
        }

        return $nbWays;
    }

    public function getNbWaysToWinOptimal(): int
    {
        // Du + petit vers le + grand
        $hold = 0;
        $count1 = 0;

        while (true) {

            $distance = Distance::calcul($this->duration, $hold);

            if ($distance > $this->record) {
                break;
            }

            $hold++;
            $count1++;
        }

        // Du + grand vers le + petit
        $hold = $this->duration;
        $count2 = 0;

        while (true) {

            $distance = Distance::calcul($this->duration, $hold);

            if ($distance > $this->record) {
                break;
            }

            $hold--;
            $count2++;
        }

        return $this->duration - $count1 - $count2 + 1;
    }
}