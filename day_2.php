<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day2\Control;
use Solutions\Day2\Game;
use Solutions\Day2\Power;

$data = Reader::getDataForDay(2, Reader::DATA);

$control = new Control;
$power = new Power;

foreach ($data as $gameInformations) {
    assert(! is_null($gameInformations));
    
    $game = Game::createFromText($gameInformations);

    $control->verifyGame($game); // 1
    $power->determineFewest($game); // 2
}

echo '1 : ' . $control->getScore();
echo "\n";
echo '2 : ' . $power->getScore();