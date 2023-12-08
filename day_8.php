<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day8\Directions;
use Solutions\Day8\MultiDirections;

$data = Reader::getDataForDay(8, Reader::DATA);

// PARTIE 1 -------------------------------------
$directions = new Directions($data[0]);

// On enlève les 2 premières lignes
unset($data[0]);
unset($data[1]);

foreach ($data as $pathInformations) {
    $directions->addPath($pathInformations);
}

echo '1 : ' . $directions->moves();

echo "\n";

// PARTIE 2 -------------------------------------
$data = Reader::getDataForDay(8, Reader::DATA);
$multiDirections = new MultiDirections($data[0]);

// On enlève les 2 premières lignes
unset($data[0]);
unset($data[1]);

foreach ($data as $pathInformations) {
    $multiDirections->addPath($pathInformations);
}

$multiDirections->initPositions();
$multiDirections->moveAll();

echo '2 : ' . $multiDirections->total();