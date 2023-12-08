<?php
declare(strict_types=1);

namespace Solutions\Day8;

class MultiDirections
{
    /**
     * @var array<string, Path> $paths
     */
    public array $paths;

    /**
     * @var Position[] $positions
     */
    public array $positions;

    public function __construct(
        private string $sequence
    ) {}

    public function addPath(string $informations): void
    {
        [$source, $left, $right] = sscanf($informations, '%s = (%[^,], %[^)])');
        $this->paths[$source] = new Path($left, $right);
    }

    public function initPositions(): void
    {
        foreach ($this->paths as $position => $path) {
            if (substr($position, -1) === 'A') {
                $this->positions[] = new Position($position);
            }
        }
    }

    /**
     * On va chercher le nombre d'itération pour chaque position de départ
     */
    public function moveAll(): void
    {
        $nbSequences = strlen($this->sequence);
        foreach ($this->positions as $position) {

            $iSequence = 0;
            while (! $position->isArrived()) {
                $move = $this->sequence[$iSequence];
                $position->next($this->paths[$position->position], $move);

                $iSequence++;
                if ($iSequence === $nbSequences) {
                    $iSequence = 0;
                }
            }
        }
    }

    /**
     * On se base sur le plus grand dénominateur commun pour trouver le premier "croisement"
     */
    public function total(): int
    {
        // On recherche le plus grand dénominateur commun
        $pgcd = $this->positions[0]->iteration;

        foreach ($this->positions as $position) {
            $pgcd = $this->pgcd($pgcd, $position->iteration);
        }

        // Calcul du premier croisement
        $result = 1;

        foreach ($this->positions as $position) {
            $result *= $position->iteration / $pgcd;
        }

        return $result * $pgcd;
    }

    /**
     * Fonction récursive de recherche du + grand dénominateur commun
     */
    private function pgcd(int $a, int $b): int
    {
        if ($b == 0) {
            return $a;
        }
        
        return $this->pgcd($b, $a % $b);
    }
}