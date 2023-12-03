<?php
declare(strict_types=1);

namespace Solutions\Day3;

use Utils\Utils;

class Schematic
{
    // Une map avec des éléments à chaque coordonnées
    /**
     * @var array<string, string> $points
     */
    private array $points = [];

    // Et des "Parts"
    /**
     * @var Part[] $parts
     */
    private array $parts = [];

    // [2] et des "Gears"
    /**
     * @var Gear[] $gears
     */
    private array $gears = [];

    private int $y = 0;

    public function setLine(?string $line): void
    {
        $startedPart = false;
        $xStart = null;
        $xEnd = null;
        $number = null;

        assert(! is_null($line));
        foreach (str_split($line) as $x => $pointValue) {

            // On intègre les points
            $coordinates = "$x.$this->y";
            $this->points[$coordinates] = $pointValue;

            // On détecte les Gears
            if ($pointValue === Gear::SYMBOL) {
                $this->gears[] = new Gear($x, $this->y);
            }

            // On détecte les "Parts"
            if (is_numeric($pointValue)) {

                // Nouvelle Part
                if (! $startedPart) {
                    $startedPart = true;
                    $number = $pointValue;
                    $xStart = $x;
                    $xEnd = $x; // On va avancer à chaque fois
                    continue;
                }

                // Part déjà existante
                $number .= $pointValue;
                $xEnd = $x; // On va avancer à chaque fois
                continue;
            }

            // Ce n'est plus un chiffre
            if ($startedPart) { // On avait bien une part en cours
                // On peut l'enregistrer
                $this->parts[] = new Part(
                    y: $this->y,
                    xStart: $xStart,
                    xEnd: $xEnd,
                    number: $number
                );

                $startedPart = false;
            }
        }

        // On a tout fini, on vérifie qu'on ait pas une Part en cours
        if ($startedPart) { // On avait bien une part en cours
            // On peut l'enregistrer
            $this->parts[] = new Part(
                y: $this->y,
                xStart: $xStart,
                xEnd: $xEnd,
                number: $number
            );

            $startedPart = false;
        }

        // Pour la ligne suivante
        $this->y++;
    }

    public function isRealPartNumber(Part $part): bool
    {
        // On va checker en diagonale, on cherche le coin en bas à gauche vers le coin en haut à droite
        $yBottomLeft = $part->y - 1;
        $xBottomLeft = $part->xStart - 1;

        $yTopRight = $part->y + 1;
        $xBottomRight = $part->xEnd + 1;

        for ($x = $xBottomLeft; $x <= $xBottomRight; $x++) {
            for ($y = $yBottomLeft; $y <= $yTopRight; $y++) {
                $coordinates = "$x.$y";

                if (! isset($this->points[$coordinates])) {
                    continue;
                }

                if (Symbols::isSymbol($this->points[$coordinates])) {
                    return true;
                }
            }
        }

        return false;
    }

    public function controlEngineParts(): int
    {
        // Le code de base pour bien comprendre la mécanique
        // $sum = 0;

        // foreach ($this->parts as $part) {
        //     if (! $this->isRealPartNumber($part)) {
        //         continue;
        //     }

        //     $sum += (int) $part->number;
        // }

        // return $sum;

        // Avec la méthode sum de Utils
        return Utils::sum($this->parts, function ($part) {
            return $this->isRealPartNumber($part) ? (int) $part->number : 0;
        });
    }

    public function controlEngineGears(): int
    {
        // Le code de base pour bien comprendre la mécanique
        // $sum = 0;

        // foreach ($this->gears as $gear) {
            
        //     $parts = [];
        //     foreach ($this->parts as $part) {
        //         if ($part->isClose($gear->x, $gear->y)) {
        //             $parts[] = $part;
        //         }
        //     }

        //     if (count($parts) !== 2) {
        //         continue;
        //     }

        //     $sum += ((int) $parts[0]->number * (int) $parts[1]->number);
        // }

        // return $sum;
        
        // Avec la méthode sum de Utils
        return Utils::sum($this->gears, function($gear) {

            $parts = [];
            foreach ($this->parts as $part) {
                if ($part->isClose($gear->x, $gear->y)) {
                    $parts[] = $part;
                }
            }

            if (count($parts) !== 2) {
                return 0;
            }

            return ((int) $parts[0]->number * (int) $parts[1]->number);
        });
    }
}