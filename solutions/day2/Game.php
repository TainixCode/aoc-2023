<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Game
{
    public function __construct(
        public readonly int $number,

        /**
         * @var Round[] $rounds
         */
        private array $rounds
    ) {}

    public static function createFromText(string $informations): Game
    {
        $data = explode(':', $informations);
        $gameNumber = (int) filter_var($data[0], FILTER_SANITIZE_NUMBER_INT);

        $roundsData = explode(';', trim($data[1]));

        $rounds = [];

        foreach ($roundsData as $round) {
            $rounds[] = Round::createFromText($round);
        }

        return new self($gameNumber, $rounds);
    }

    /**
     * @return Round[] $rounds
     */
    public function getRounds(): array
    {
        return $this->rounds;
    }
}