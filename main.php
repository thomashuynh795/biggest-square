<?php

require('functions.php');

system("clear");
define("x", $argv[1]);
define("y", $argv[2]);
define("density", $argv[3]);

$command = "perl script.pl ".x." ".y." ".density;
$array = null;
exec($command, $array);
convert($array);


// converts all "o" into 0 and all "." into 1 in the map
for($i = 0; $i < y; $i++) {
  for($j = 0; $j < x; $j++) {
    if($array[$i][$j] === "o") {
      $array[$i][$j] = 0;
    }
    else if($array[$i][$j] === ".") {
      $array[$i][$j] = 1;
    }
  }
}

// evaluates the parents addition
for($i = 0; $i < y; $i++) {
  for($j = 0; $j < x; $j++) {
    if($array[$i][$j] == 1) {
      if($i != 0 && $j != 0) {
        $array[$i][$j] = min($array[$i-1][$j-1], $array[$i-1][$j], $array[$i][$j-1]) + 1;
      }
      else $array[$i][$j] = 1;
    }
    else {
      continue;
    }
  }
}

draw_square($array, find_highest($array));
print_colored_array($array);

