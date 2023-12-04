<?php
declare(strict_types=1);

namespace Solutions\Day4;

class Card
{
    public function __construct(
        /**
         * @var int[] $winningNumbers
         */
        public readonly array $winningNumbers,

        /**
         * @var int[] $playingNumbers
         */
        public readonly array $playingNumbers,

        private int $instances = 1,
    ) { }

    public static function createFromText(string $informations, int $instances = 1): Card
    {
        [, $numbers] = explode(':', $informations);

        [$winningNumbersPart, $playingNumbersPart] = explode('|', $numbers);

        preg_match_all('/\d+/', $winningNumbersPart, $winningNumbers);
        preg_match_all('/\d+/', $playingNumbersPart, $playingNumbers);

        $winningNumbers = array_map('intval', $winningNumbers[0]);
        $playingNumbers = array_map('intval', $playingNumbers[0]);

        return new self($winningNumbers, $playingNumbers, $instances);
    }

    public function getMatchingNumbers(): int
    {
        return count(array_intersect($this->playingNumbers, $this->winningNumbers));
    }

    public function getScore(): int
    {
        $count = $this->getMatchingNumbers();

        if ($count === 0) {
            return 0;
        }

        return (int) pow(2, $count - 1);
    }

    public function getInstances(): int
    {
        return $this->instances;
    }
}