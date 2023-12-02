<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Control
{
    private const LIMIT_RED = 12;
    private const LIMIT_GREEN = 13;
    private const LIMIT_BLUE = 14;

    private int $score = 0;

    public function verifyGame(Game $game): void
    {
        foreach ($game->getRounds() as $round) {

            if ($round->red > self::LIMIT_RED) {
                return;
            }

            if ($round->green > self::LIMIT_GREEN) {
                return;
            }

            if ($round->blue > self::LIMIT_BLUE) {
                return;
            }
        }
        
        // Aucun blocage, tout est OK, on incrémente le score
        $this->score += $game->number;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}