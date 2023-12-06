<?php
declare(strict_types=1);

namespace Solutions\Day5;

class Almanac
{
    public function __construct(
        /**
         * @var int[]
         */
        public readonly array $seeds,

        /**
         * @var array<int, array<int, int>> $steps
         */
        public readonly array $steps,
    ) {}

    public function getClosestLocation(): int
    {
        $locations = [];

        foreach ($this->seeds as $seed) {

            $location = $seed;
            foreach ($this->steps as $ranges) {
                $location = Converter::convertAll($location, $ranges);
            }

            $locations[] = $location;
        }

        return min($locations);
    }

    public function getRealClosestLocation(): int
    {
        $minLocations = [];

        $max = count($this->seeds) / 2;

        $search = [];
        for ($i = 0; $i < $max; $i+=2) {

            $locations = [];
            for ($seed = $this->seeds[$i]; $seed < $this->seeds[$i] + $this->seeds[$i+1]; $seed++) {

                $location = $seed;

                if (in_array($location, $search)) {
                    continue;
                }

                $search[] = $location;

                foreach ($this->steps as $ranges) {
                    $location = Converter::convertAll($location, $ranges);
                }

                $locations[] = $location;
            }

            $minLocations[] = min($locations);
        }

        return min($minLocations);
    }

    /**
     * @var array<int, null|string> $data
     */
    public static function createFromText(array $data): Almanac
    {
        // Première ligne
        $seedsInformations = $data[0];
        [, $seeds] = explode(':', $seedsInformations);
        $seeds = trim($seeds);
        $seeds = explode(' ', $seeds);
        $seeds = array_map('intval', $seeds);

        // On enlève les 2 premières lignes
        unset($data[0]);
        unset($data[1]);

        // Initialisation
        $steps = [];
        $ranges = [];

        foreach ($data as $line) {
            // Si c'est null
            if (is_null($line)) {
                $steps[] = $ranges;
                continue;
            }

            // Si on trouve "map"
            if (strpos($line, 'map') !== false) {
                $ranges = [];
                continue;
            }

            $range = explode(' ', $line);
            $range = array_map('intval', $range);

            $ranges[] = $range;
        }

        // Dernière valeurs
        $steps[] = $ranges;

        return new self($seeds, $steps);
    }
}