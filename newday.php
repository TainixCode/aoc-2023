<?php

// Récupère l'entier passé en paramètre
$day = intval($argv[1]);

// Crée les répertoires data/dayX, tests/dayX et solutions/dayX s'ils n'existent pas
if (!file_exists("data/day{$day}")) {
    mkdir("data/day{$day}", 0777, true);
  }
  
  if (!file_exists("tests/day{$day}")) {
    mkdir("tests/day{$day}", 0777, true);
  }
  
  if (!file_exists("solutions/day{$day}")) {
    mkdir("solutions/day{$day}", 0777, true);
  }

// Crée les fichiers data.txt et sample.txt dans data/dayX
file_put_contents("data/day{$day}/data.txt", "");
file_put_contents("data/day{$day}/sample.txt", "");
file_put_contents("tests/day{$day}/day{$day}Test.php", "<?php\ndeclare(strict_types=1);\n\n");

// Crée le fichier day_X.php à la racine
file_put_contents("day_{$day}.php", "<?php
declare(strict_types=1);\n
require './vendor/autoload.php';\n
use Data\Reader;\n
\$data = Reader::getDataForDay({$day}, Reader::SAMPLE);\n\n");
