<?php
declare(strict_types=1);

use Solutions\Day6\Distance;
use Solutions\Day6\Race;

test('Calcul distance', function() {

    expect(Distance::calcul(7, 0))->toBe(0);
    expect(Distance::calcul(7, 1))->toBe(6);
    expect(Distance::calcul(7, 2))->toBe(10);
    expect(Distance::calcul(7, 3))->toBe(12);
    expect(Distance::calcul(7, 4))->toBe(12);
    expect(Distance::calcul(7, 5))->toBe(10);
    expect(Distance::calcul(7, 6))->toBe(6);
    expect(Distance::calcul(7, 7))->toBe(0);

    expect(Distance::calcul(7, 8))->toBe(false);
});

test('Calcul Race 1', function() {

    $race = new Race(7, 9);
    expect($race->getNbWaysToWin())->toBe(4);
    expect($race->getNbWaysToWinOptimal())->toBe(4);
});

test('Calcul Race 2', function() {

    $race = new Race(15, 40);
    expect($race->getNbWaysToWin())->toBe(8);
    expect($race->getNbWaysToWinOptimal())->toBe(8);
});

test('Calcul Race 3', function() {

    $race = new Race(30, 200);
    expect($race->getNbWaysToWin())->toBe(9);
    expect($race->getNbWaysToWinOptimal())->toBe(9);
});


test('Calcul Race Part 2', function() {
    
    $race = new Race(71530, 940200);
    expect($race->getNbWaysToWin())->toBe(71503);
    expect($race->getNbWaysToWinOptimal())->toBe(71503);
});