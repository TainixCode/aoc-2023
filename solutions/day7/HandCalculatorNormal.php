<?php
declare(strict_types=1);

namespace Solutions\Day7;

class HandCalculatorNormal extends HandCalculator
{
    public static function combinaison(string $cardsValues): int
    {
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
            return self::C_QUADS;
        }

        if (in_array(3, $cardsSort) && in_array(2, $cardsSort)) {
            return self::C_FULL;
        }

        if (in_array(3, $cardsSort)) {
            return self::C_THREE;
        }

        if (in_array(2, $cardsSort) && count($cardsSort) == 3) {
            return self::C_2_PAIRS;
        }

        if (in_array(2, $cardsSort)) {
            return self::C_1_PAIR;
        }

        return self::C_NOTHING;
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
        $rank = ['2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K', 'A'];

        return array_search($card1, $rank) <=> array_search($card2, $rank);
    }
}