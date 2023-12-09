<?php
declare(strict_types=1);

namespace Solutions\Day9;

class Series
{
    /**
     * @param int[] $serie
     * @return int[]
     */
    public static function transform(array $serie): array
    {
        $return = [];

        $compare = $serie[0];

        foreach ($serie as $i => $value) {

            if ($i === 0) {
                continue;
            }

            $return[] = $value - $compare;
            $compare = $value;
        }

        return $return;
    }

    /**
     * @param int[] $serie
     */
    public static function haveJustZeros(array $serie): bool
    {
        return array_unique($serie) === [0];
    }

    /**
     * @param int[] $serie
     */
    public static function findNextNumber(array $serie): int
    {
        $belowSeries = [];
        $currentSerie = $serie;

        while (! self::haveJustZeros($currentSerie)) {

            $newSerie = self::transform($currentSerie);

            $belowSeries[] = $newSerie;
            $currentSerie = $newSerie;
        }

        $add = 0;
        $belowSeries = array_reverse($belowSeries);
        foreach ($belowSeries as $bSerie) {
            $add += $bSerie[array_key_last($bSerie)];
        }

        return $serie[array_key_last($serie)] + $add;
    }

    /**
     * @param int[] $serie
     */
    public static function findPreviousNumber(array $serie): int
    {
        // Cette fois-ci on met la première ligne, car on en aura besoin à la fin
        $belowSeries = [$serie];
        $currentSerie = $serie;

        while (! self::haveJustZeros($currentSerie)) {

            $newSerie = self::transform($currentSerie);

            $belowSeries[] = $newSerie;
            $currentSerie = $newSerie;
        }

        $minus = 0;
        $belowSeries = array_reverse($belowSeries);
        foreach ($belowSeries as $i => $bSerie) {

            if ($i === 0) {
                continue; // On zappe la première ligne puisque c'est zéro
            }

            // La valeur d'avant est égal à la première valeur - la première valeur de la ligne précédente
            $previousValue = $bSerie[0] - $minus;
            $belowSeries[$i] = array_merge([$previousValue], $belowSeries[$i]);

            $minus = $previousValue;
        }

        return $minus;
    }
}