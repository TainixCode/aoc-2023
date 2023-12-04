<?php

declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day4\Card;
use Solutions\Day4\CardCollection;
use Utils\Utils;

$data = Reader::getDataForDay(4, Reader::DATA);

echo "1 : " . 
    Utils::sum($data, function ($cardInformations) {
        return Card::createFromText($cardInformations)->getScore();
    });

echo "\n";

$collection = new CardCollection;
$collection->addCards($data);

echo "2 : " . $collection->getTotalInstances();