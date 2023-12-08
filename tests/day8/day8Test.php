<?php
declare(strict_types=1);

use Solutions\Day8\Directions;

test('Construction Directions', function() {

    $directions = new Directions('LR');

    $directions->addPath('AAA = (BBB, CCC)');

    expect(array_key_first($directions->paths))->toBe('AAA');
    expect($directions->paths['AAA']->left)->toBe('BBB');
    expect($directions->paths['AAA']->right)->toBe('CCC');

    expect($directions->paths['AAA']->get('L'))->toBe('BBB');
    expect($directions->paths['AAA']->get('R'))->toBe('CCC');
});