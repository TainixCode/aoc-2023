<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Utils\Utils;

use Solutions\Day1\Calibration;
use Solutions\Day1\Filter;

$data = Reader::getDataForDay(1, Reader::DATA);

echo '1 : ' .
    Utils::sum($data, function($item) {
        return Filter::turnToNumber($item);
    });

echo "\n";

echo '2 : ' .
    Utils::sum($data, function($item) {
        $calibration = new Calibration($item);
        $calibration->analyze();
        return $calibration->getNumber();
    });