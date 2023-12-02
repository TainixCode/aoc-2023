<?php

use Solutions\Day2\Control;
use Solutions\Day2\Game;
use Solutions\Day2\Power;
use Solutions\Day2\Round;

test('Parsing et construction d\'un Round', function() {

    $round = Round::createFromText(' 3 blue, 4 red');

    expect($round->blue)->toBe(3);
    expect($round->red)->toBe(4);
});

test('Parsing et construction d\'un Game', function() {

    $game = Game::createFromText('Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green');

    expect($game->number)->toBe(1);

    expect($game->getRounds()[0]->blue)->toBe(3);
    expect($game->getRounds()[1]->red)->toBe(1);
    expect($game->getRounds()[1]->green)->toBe(2);
});

test('Vérification jeu OK', function() {

    $game = Game::createFromText('Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue');

    $control = new Control;
    $control->verifyGame($game);

    expect($control->getScore())->toBe(2); // Le numéro du Game
});

test('Vérification jeu KO', function() {

    $game = Game::createFromText('Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red');

    $control = new Control;
    $control->verifyGame($game);

    expect($control->getScore())->toBe(0); // Le score n'a pas progressé
});

test('Puissance des jeux', function(string $informations, int $score) {

    $game = Game::createFromText($informations);

    $power = new Power;
    $power->determineFewest($game);

    expect($power->getScore())->toBe($score);
})->with([
    ['Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red', 630],
    ['Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green', 36]
]);