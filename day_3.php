<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day3\Schematic;

$data = Reader::getDataForDay(3, Reader::DATA);

$schematic = new Schematic;

foreach ($data as $line) {
    $schematic->setLine($line);
}

echo '1 : ' . $schematic->controlEngineParts();
echo "\n";
echo '2 : ' . $schematic->controlEngineGears();