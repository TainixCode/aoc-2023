<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day7\Game;
use Solutions\Day7\HandCalculatorJoker;

$data = Reader::getDataForDay(7, Reader::DATA);

$game = new Game;

foreach ($data as $informations) {
    $game->addHand($informations);
}

$game->sort();
echo $game->getScore();

echo "\n";

$game->sort(HandCalculatorJoker::class);
echo $game->getScore();