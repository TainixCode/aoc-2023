<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day5\Almanac;

$data = Reader::getDataForDay(5, Reader::DATA);

$almanac = Almanac::createFromText($data);

echo "1 : " . $almanac->getClosestLocation();
echo "\n";
echo "2 : " . $almanac->getRealClosestLocation();