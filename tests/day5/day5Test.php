<?php
declare(strict_types=1);

use Data\Reader;
use Solutions\Day5\Almanac;
use Solutions\Day5\Converter;

test('Conversion Range 1', function() {

    $ranges = [
        [50, 98, 2],
        [52, 50, 48]
    ];
    
    expect(Converter::convertAll(0, $ranges))->toBe(0);
    expect(Converter::convertAll(1, $ranges))->toBe(1);
    expect(Converter::convertAll(10, $ranges))->toBe(10);
    
    expect(Converter::convertAll(48, $ranges))->toBe(48);
    expect(Converter::convertAll(49, $ranges))->toBe(49);
    
    expect(Converter::convertAll(50, $ranges))->toBe(52);
    expect(Converter::convertAll(51, $ranges))->toBe(53);

    expect(Converter::convertAll(97, $ranges))->toBe(99);
    expect(Converter::convertAll(98, $ranges))->toBe(50);
    expect(Converter::convertAll(99, $ranges))->toBe(51);

    expect(Converter::convertAll(100, $ranges))->toBe(100);
});

test('Construction Almanac', function() {

    $data = Reader::getDataForDay(5, Reader::SAMPLE);

    $almanac = Almanac::createFromText($data);

    expect($almanac->seeds)->toBe([79, 14, 55, 13]);

    $step0 = [
        [50, 98, 2],
        [52, 50, 48]
    ];

    expect($almanac->steps[0])->toBe($step0);

    $step6 = [
        [60, 56, 37],
        [56, 93, 4]
    ];

    expect($almanac->steps[6])->toBe($step6);
});

test('1 - jeu de données', function() {
    $data = Reader::getDataForDay(5, Reader::SAMPLE);

    $almanac = Almanac::createFromText($data);

    expect($almanac->getClosestLocation())->toBe(35);
});