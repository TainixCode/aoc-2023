<?php
declare(strict_types=1);

use Solutions\Day9\Series;

test('Series - transform', function() {

    expect(Series::transform([0, 3, 6, 9, 12, 15]))->toBe([3, 3, 3, 3, 3]);
});

test('Series - zeros', function() {

    expect(Series::haveJustZeros([0, 0, 0]))->toBe(true);
    expect(Series::haveJustZeros([0, 1, 0]))->toBe(false);
});

test('next Number', function() {

    expect(Series::findNextNumber([0, 3, 6, 9, 12, 15]))->toBe(18);
    expect(Series::findNextNumber([1, 3, 6, 10, 15, 21]))->toBe(28);
    expect(Series::findNextNumber([10, 13, 16, 21, 30, 45]))->toBe(68);
});

test('previous Number', function() {

    expect(Series::findPreviousNumber([0, 3, 6, 9, 12, 15]))->toBe(-3);
    expect(Series::findPreviousNumber([1, 3, 6, 10, 15, 21]))->toBe(0);
    expect(Series::findPreviousNumber([10, 13, 16, 21, 30, 45]))->toBe(5);
});