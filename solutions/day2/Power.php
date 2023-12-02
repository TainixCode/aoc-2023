<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Power
{
    private int $score = 0;

    public function determineFewest(Game $game): void
    {
        // Recherche des maximums
        $blue = 0;
        $green = 0;
        $red = 0;

        foreach ($game->getRounds() as $round) {

            if ($round->blue > $blue) {
                $blue = $round->blue;
            }

            if ($round->green > $green) {
                $green = $round->green;
            }

            if ($round->red > $red) {
                $red = $round->red;
            }
        }

        // Calcul du score
        $score = 1;

        $score *= $blue === 0 ? 1 : $blue;
        $score *= $green === 0 ? 1 : $green;
        $score *= $red === 0 ? 1 : $red;

        $this->score += $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}