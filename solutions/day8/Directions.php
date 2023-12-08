<?php
declare(strict_types=1);

namespace Solutions\Day8;

class Directions
{
    /**
     * @var array<string, Path> $paths
     */
    public array $paths;

    private string $position = 'AAA';

    private int $nbSteps = 0;

    public function __construct(
        private string $sequence
    ) {}

    public function addPath(string $informations): void
    {
        [$source, $left, $right] = sscanf($informations, '%s = (%[^,], %[^)])');
        $this->paths[$source] = new Path($left, $right);
    }

    public function moves(): int
    {
        $iSequence = 0;
        $nbSequences = strlen($this->sequence);

        while (true) {
            if ($this->position === 'ZZZ') {
                break;
            }

            $currentPath = $this->paths[$this->position];

            $move = $this->sequence[$iSequence];
            $this->position = $currentPath->get($move);

            $this->nbSteps++;
            
            $iSequence++;
            if ($iSequence === $nbSequences) {
                // On revient à 0
                $iSequence = 0;
            }
        }

        return $this->nbSteps;
    }
}