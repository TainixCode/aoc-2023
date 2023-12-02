<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Power
{
    private int $score = 0;

    public function determineFewest(Game $game): void
    {
        // Recherche des maximums (on démarre à 1 pour ne pas avoir de 0 dans le produit du score)
        $blue = 1;
        $green = 1;
        $red = 1;

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
        $this->score += ($blue * $green * $red);
    }

    public function getScore(): int
    {
        return $this->score;
    }
}