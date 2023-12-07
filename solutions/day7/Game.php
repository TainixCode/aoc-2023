<?php
declare(strict_types=1);

namespace Solutions\Day7;

class Game
{
    /**
     * @var Hand[] $hands
     */
    public array $hands;

    public function addHand(string $informations): void
    {
        $this->hands[] = Hand::createFromText($informations);
    }

    public function sort(string $className = HandCalculatorNormal::class): void
    {
        usort($this->hands, [$className, 'rank']);
    }

    public function getScore(): int
    {
        $sum = 0;

        foreach ($this->hands as $rank => $hand) {
            $sum += ($rank + 1) * $hand->bid;
        }

        return $sum;
    }
}