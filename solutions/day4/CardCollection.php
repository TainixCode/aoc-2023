<?php
declare(strict_types=1);

namespace Solutions\Day4;

use Utils\Utils;

class CardCollection
{
    /**
     * @var Card[] $cards
     */
    private array $cards = [];

    /**
     * @var array<int, int> $stockOfCards
     */
    private array $stockOfCards = [];

    private int $cardNumber = 1;

    /**
     * @param array<int, null|string> $data
     */
    public function addCards(array $data): void
    {
        foreach ($data as $informations) {
            if (is_null($informations)) {
                continue;
            }

            $this->addCard($informations);
        }
    }

    public function addCard(string $informations): void
    {
        $instances = $this->searchInStock($this->cardNumber);

        $card = Card::createFromText($informations, 1 + $instances);
        $this->cards[] = $card;

        $nbWinningCards = $card->getMatchingNumbers();
        for ($i = 1; $i <= $nbWinningCards; $i++) {
            $this->upStock($this->cardNumber + $i, $card->getInstances());
        }

        $this->cardNumber++;
    }

    private function upStock(int $cardNumber, int $nbWinningCards): void
    {
        if (! isset($this->stockOfCards[$cardNumber])) {
            $this->stockOfCards[$cardNumber] = 0;
        }

        $this->stockOfCards[$cardNumber] += $nbWinningCards;
    }

    public function searchInStock(int $cardNumber): int
    {
        return $this->stockOfCards[$cardNumber] ?? 0;
    }

    public function getTotalInstances(): int
    {
        return Utils::sum($this->cards, function ($card) {
            return $card->getInstances();
        });
    }
}