<?php
declare(strict_types=1);

use Solutions\Day3\Symbols;

test('détection symboles', function($char, $result) {

    expect(Symbols::isSymbol($char))->toBe($result);

})->with([
    ['.', false],
    ['3', false],
    ['5', false],
    ['*', true],
    ['$', true],
    ['/', true],
]);