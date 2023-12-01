<?php

use Solutions\Day1\Calibration;
use Solutions\Day1\Filter;

test('Filter, conserve que les chiffres dans une chaine de caractères', function (string $start, string $end) {

    expect(Filter::keepDigits($start))->toBe($end);

})->with([
    'Chiffres au début et à la fin' => ['1zo2ur3gzurg4', '1234'],
    'Chiffres que dans la chaine' => ['a1zo2ur3gzu4rg', '1234'],
    'Chiffre à la fin' => ['q1zo2ur3gzu4', '1234'],
    'Chiffre au début' => ['1zo2ur3gzu4okj', '1234'],

    'Pas de chiffre' => ['zrizbizrbzepj', ''],
    'Que des chiffres' => ['46457346', '46457346'],
]);

test('Filter, transforme en nombre', function (string $start, int $number) {

    expect(Filter::turnToNumber($start))->toBe($number);

})->with([
    'Chiffres au début et à la fin' => ['1zo2ur3gzurg4', 14],
    'Chiffres que dans la chaine' => ['a1zo2ur3gzu4rg', 14],
    'Chiffre à la fin' => ['q1zo2ur3gzu4', 14],
    'Chiffre au début' => ['1zo2ur3gzu4okj', 14],

    'Pas de chiffre' => ['zrizbizrbzepj', 0],
    'Que des chiffres' => ['46457346', 46],
]);

test('Filter, recherche de chiffre écrit en lettre en première position dans la chaine', function(string $start, ?string $result) {

    expect(Filter::findDigit($start))->toBe($result);

})->with([
    'Exemple énoncé 1' => ['two1nine', '2'],
    'Exemple énoncé 2' => ['eightwothree', '8'],
    'Exemple énoncé 3' => ['abcone2threexyz', null],
    'Exemple énoncé 4' => ['xtwone3four', null],
]);

test('Calibration', function(string $input, int $number) {

    $calibration = new Calibration($input);
    $calibration->analyze();
    expect($calibration->getNumber())->toBe($number);

})->with([
    'Exemple énoncé 1' => ['two1nine', 29],
    'Exemple énoncé 2' => ['eightwothree', 83],
    'Exemple énoncé 3' => ['abcone2threexyz', 13],
    'Exemple énoncé 4' => ['xtwone3four', 24],
    'Exemple énoncé 5' => ['4nineeightseven2', 42],
    'Exemple énoncé 6' => ['zoneight234', 14],
    'Exemple énoncé 7' => ['7pqrstsixteen', 76],
]);