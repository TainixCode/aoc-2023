<?php
declare(strict_types=1);

use Data\Reader;
use Solutions\Day4\Card;
use Solutions\Day4\CardCollection;

test('Parsing d\'une card', function() {

    $cardInformations = 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53';

    $card = Card::createFromText($cardInformations);

    expect($card->winningNumbers)->toBe([41, 48, 83, 86, 17]);
    expect($card->playingNumbers)->toBe([83, 86, 6, 31, 17, 9, 48, 53]);
});

test('Parsing d\'une autre card', function() {

    $cardInformations = 'Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1';

    $card = Card::createFromText($cardInformations);

    expect($card->winningNumbers)->toBe([1, 21, 53, 59, 44]);
    expect($card->playingNumbers)->toBe([69, 82, 63, 72, 16, 21, 14, 1]);
});

test('Numéro correspondants', function() {

    $cardInformations = 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53';

    $card = Card::createFromText($cardInformations);

    expect($card->getMatchingNumbers())->toBe(4);
});

test('Calcul score', function() {

    $cardInformations = 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53';

    $card = Card::createFromText($cardInformations);

    expect($card->getScore())->toBe(8);
});


test('Calcul score à zéro', function() {

    $cardInformations = 'Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11';

    $card = Card::createFromText($cardInformations);

    expect($card->getScore())->toBe(0);
});


test('Fonctionnement du stock - étape 1', function() {

    $cardCollection = new CardCollection;

    $cardCollection->addCard('Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53');

    expect($cardCollection->searchInStock(2))->toBe(1);
    expect($cardCollection->searchInStock(3))->toBe(1);
    expect($cardCollection->searchInStock(4))->toBe(1);
    expect($cardCollection->searchInStock(5))->toBe(1);

    expect($cardCollection->searchInStock(6))->toBe(0);
});


test('Fonctionnement du stock - étape 2', function() {

    $cardCollection = new CardCollection;

    $cardCollection->addCard('Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53');
    $cardCollection->addCard('Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19');

    expect($cardCollection->searchInStock(3))->toBe(3);
    expect($cardCollection->searchInStock(4))->toBe(3);
    expect($cardCollection->searchInStock(5))->toBe(1);
    
    expect($cardCollection->searchInStock(6))->toBe(0);
});


test('Nombre de cartes - jeu de données 1', function() {

    $cardCollection = new CardCollection;

    $cardCollection->addCard('Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53');
    $cardCollection->addCard('Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19');
    $cardCollection->addCard('Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1');
    $cardCollection->addCard('Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83');
    $cardCollection->addCard('Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36');
    $cardCollection->addCard('Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11');
    
    expect($cardCollection->getTotalInstances())->toBe(30);
});