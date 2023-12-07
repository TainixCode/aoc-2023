<?php
declare(strict_types=1);

use Solutions\Day7\Hand;
use Solutions\Day7\HandCalculator;
use Solutions\Day7\HandCalculatorJoker;
use Solutions\Day7\HandCalculatorNormal;

test('HandCalculatorNormal - combinaison', function() {

    expect(HandCalculatorNormal::combinaison('AAAAA'))->toBe(HandCalculator::C_POKER);
    expect(HandCalculatorNormal::combinaison('AA2AA'))->toBe(HandCalculator::C_QUADS);
    
    expect(HandCalculatorNormal::combinaison('AA222'))->toBe(HandCalculator::C_FULL);
    expect(HandCalculatorNormal::combinaison('TTT99'))->toBe(HandCalculator::C_FULL);
    
    expect(HandCalculatorNormal::combinaison('A7222'))->toBe(HandCalculator::C_THREE);
    expect(HandCalculatorNormal::combinaison('TTTK9'))->toBe(HandCalculator::C_THREE);

    expect(HandCalculatorNormal::combinaison('A7A22'))->toBe(HandCalculator::C_2_PAIRS);
    expect(HandCalculatorNormal::combinaison('TKTK9'))->toBe(HandCalculator::C_2_PAIRS);

    expect(HandCalculatorNormal::combinaison('A7AQ2'))->toBe(HandCalculator::C_1_PAIR);
    expect(HandCalculatorNormal::combinaison('T7TK9'))->toBe(HandCalculator::C_1_PAIR);

    expect(HandCalculatorNormal::combinaison('A7TQ2'))->toBe(HandCalculator::C_NOTHING);
    expect(HandCalculatorNormal::combinaison('T73K9'))->toBe(HandCalculator::C_NOTHING);
});

test('HandCalculatorNormal - rank', function() {

    $hand1 = Hand::createFromText('33332 1');
    $hand2 = Hand::createFromText('2AAAA 1');
    expect(HandCalculatorNormal::rank($hand1, $hand2))->toBe(1);

    // expect(HandCalculatorNormal::rank('77888', '77788'))->toBe(1);
});

test('HandCalculatorJoker', function() {
    expect(HandCalculatorJoker::combinaison('AAAAA'))->toBe(HandCalculator::C_POKER);
    expect(HandCalculatorJoker::combinaison('JJJJJ'))->toBe(HandCalculator::C_POKER);
    expect(HandCalculatorJoker::combinaison('AJAAA'))->toBe(HandCalculator::C_POKER); // Carré + 1 J
    expect(HandCalculatorJoker::combinaison('AAAJJ'))->toBe(HandCalculator::C_POKER); // Brelan + 2J
    expect(HandCalculatorJoker::combinaison('JJTTT'))->toBe(HandCalculator::C_POKER); // 2 J + Brelan

    expect(HandCalculatorJoker::combinaison('AA2AA'))->toBe(HandCalculator::C_QUADS); // Carré
    expect(HandCalculatorJoker::combinaison('AA2JA'))->toBe(HandCalculator::C_QUADS); // Brelan + 1 J
    expect(HandCalculatorJoker::combinaison('JA222'))->toBe(HandCalculator::C_QUADS); // Brelan + 1 J
    expect(HandCalculatorJoker::combinaison('88JJ2'))->toBe(HandCalculator::C_QUADS); // 2 paires dont 1 paire de J
    
    expect(HandCalculatorJoker::combinaison('AA222'))->toBe(HandCalculator::C_FULL); // Full
    expect(HandCalculatorJoker::combinaison('TTT99'))->toBe(HandCalculator::C_FULL); // Full
    expect(HandCalculatorJoker::combinaison('AJA22'))->toBe(HandCalculator::C_FULL); // 2 paires + 1 J
    expect(HandCalculatorJoker::combinaison('TKTKJ'))->toBe(HandCalculator::C_FULL); // 2 paires +1 J
    
    expect(HandCalculatorJoker::combinaison('A7222'))->toBe(HandCalculator::C_THREE);
    expect(HandCalculatorJoker::combinaison('TTTK9'))->toBe(HandCalculator::C_THREE);
    expect(HandCalculatorJoker::combinaison('TTJK9'))->toBe(HandCalculator::C_THREE); // 1 paire + 1 J
    expect(HandCalculatorJoker::combinaison('JJ73Q'))->toBe(HandCalculator::C_THREE); // 1 paire de J

    expect(HandCalculatorJoker::combinaison('A7A22'))->toBe(HandCalculator::C_2_PAIRS);
    expect(HandCalculatorJoker::combinaison('TKTK9'))->toBe(HandCalculator::C_2_PAIRS);
    expect(HandCalculatorJoker::combinaison('TTK9J'))->toBe(HandCalculator::C_THREE);

    expect(HandCalculatorJoker::combinaison('A7AQ2'))->toBe(HandCalculator::C_1_PAIR);
    expect(HandCalculatorJoker::combinaison('T7TK9'))->toBe(HandCalculator::C_1_PAIR);
    expect(HandCalculatorJoker::combinaison('A7TQJ'))->toBe(HandCalculator::C_1_PAIR); // Rien avec 1 J

    expect(HandCalculatorJoker::combinaison('A7TQ2'))->toBe(HandCalculator::C_NOTHING);
    expect(HandCalculatorJoker::combinaison('T73K9'))->toBe(HandCalculator::C_NOTHING);

    // Enoncé
    expect(HandCalculatorJoker::combinaison('32T3K'))->toBe(HandCalculator::C_1_PAIR);
    expect(HandCalculatorJoker::combinaison('KK677'))->toBe(HandCalculator::C_2_PAIRS);
    expect(HandCalculatorJoker::combinaison('T55J5'))->toBe(HandCalculator::C_QUADS);
    expect(HandCalculatorJoker::combinaison('KTJJT'))->toBe(HandCalculator::C_QUADS);
    expect(HandCalculatorJoker::combinaison('QQQJA'))->toBe(HandCalculator::C_QUADS);
});