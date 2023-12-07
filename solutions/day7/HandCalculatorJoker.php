<?php
declare(strict_types=1);

namespace Solutions\Day7;

class HandCalculatorJoker extends HandCalculator
{
    public static function combinaison(string $cardsValues): int
    {
        $numberOfJacks = substr_count($cardsValues, 'J');

        $cards = str_split($cardsValues);

        $cards = array_map(function($value) {
            $value = self::FIGURES[$value] ?? $value;
            return (int) $value;
        }, $cards);

        $cardsSort = array_count_values($cards);
        arsort($cardsSort);

        if (in_array(5, $cardsSort)) {
            return self::C_POKER;
        }

        if (in_array(4, $cardsSort)) {
            $combinaison = self::C_QUADS;

            if ($numberOfJacks > 0) {
                $combinaison = self::C_POKER;
            }

            return $combinaison;
        }

        if (in_array(3, $cardsSort) && in_array(2, $cardsSort)) {
            $combinaison = self::C_FULL;

            if ($numberOfJacks >= 2) {
                $combinaison = self::C_POKER;
            }

            return $combinaison;
        }

        if (in_array(3, $cardsSort)) {
            $combinaison = self::C_THREE;

            if ($numberOfJacks >= 1) {
                $combinaison = self::C_QUADS;
            }

            return $combinaison;
        }

        if (in_array(2, $cardsSort) && count($cardsSort) == 3) {
            $combinaison = self::C_2_PAIRS;

            if ($numberOfJacks == 1) {
                $combinaison = self::C_FULL; // 2 paires + 1 jack => full
            } elseif ($numberOfJacks == 2) {
                $combinaison = self::C_QUADS; // 1 paire + 1 paire de Jack => carré
            }

            return $combinaison;
        }

        if (in_array(2, $cardsSort)) {
            $combinaison = self::C_1_PAIR;

            if ($numberOfJacks >= 1) {
                // 1 paire + 1 jack = 1 brelan
                // 1 paire de J => 1 brelan
                $combinaison = self::C_THREE; 
            }

            return $combinaison;
        }

        $combinaison = self::C_NOTHING;

        if ($numberOfJacks == 1) {
            $combinaison = self::C_1_PAIR;
        }

        return $combinaison;
    }

    public static function rank(Hand $hand1, Hand $hand2): int
    {
        $cardsValues1 = $hand1->cards;
        $cardsValues2 = $hand2->cards;

        $cardCombinaison1 = self::combinaison($cardsValues1);
        $cardCombinaison2 = self::combinaison($cardsValues2);

        // Si les combinaisons sont différentes
        if ($cardCombinaison1 != $cardCombinaison2) {
            return $cardCombinaison1 <=> $cardCombinaison2;
        }

        foreach (str_split($cardsValues1) as $i => $card1) {
            $card2 = $cardsValues2[$i];

            $rankCard = self::rankCards($card1, $card2);

            if ($rankCard != 0) {
                return $rankCard;
            }
        }

        return 0;
    }

    private static function rankCards(string $card1, string $card2): int
    {
        $rank = ['J', '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'Q', 'K', 'A'];

        return array_search($card1, $rank) <=> array_search($card2, $rank);
    }
}