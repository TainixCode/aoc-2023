<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day1\Calibration;
use Solutions\Day1\Filter;

$data = Reader::getDataForDay(1, Reader::DATA);

$sum = 0;
foreach ($data as $value) {
    $sum += Filter::turnToNumber($value);
}
echo '1 : ' . $sum;

echo "\n";

$sum = 0;
foreach ($data as $value) {
    $calibration = new Calibration($value);
    $calibration->analyze();
    $sum += $calibration->getNumber();
}

echo '2 : ' . $sum;