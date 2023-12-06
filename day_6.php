<?php
declare(strict_types=1);

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day6\Race;

$data = Reader::getDataForDay(6, Reader::DATA);

// PARSING - PART 1
$timesData = str_replace('Time:', '', $data[0]);
$recordsData = str_replace('Distance:', '', $data[1]);

preg_match_all('/\d+/', $timesData, $times);
preg_match_all('/\d+/', $recordsData, $records);

$times = array_map('intval', $times[0]);
$records = array_map('intval', $records[0]);

$product = 1;

foreach ($times as $i => $time) {
    $race = new Race($time, $records[$i]);
    $product *= $race->getNbWaysToWin();
}

echo "1 : " . $product;
echo "\n";

// PARSING PART 2
$time = intval(str_replace(' ', '', $timesData));
$record = intval(str_replace(' ', '', $recordsData));

$race = new Race($time, $record);
echo "2 : " . $race->getNbWaysToWinOptimal();