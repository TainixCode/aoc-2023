<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day9\Series;
use Utils\Utils;

$data = Reader::getDataForDay(9, Reader::DATA);

echo "1 : " . Utils::sum($data, function($line) {

    $line = array_map('intval', explode(' ', $line));
    return Series::findNextNumber($line);
});

echo "\n";

echo "2 : " .  Utils::sum($data, function($line) {

    $line = array_map('intval', explode(' ', $line));
    return Series::findPreviousNumber($line);
});