<?php

// display map with red obstacles
function print_colored_array(array $array): void {
  for($i = 0; $i < y; $i++) {
    for($j = 0; $j < x; $j++) {
      if($array[$i][$j] == "o") {
        echo("\e[1;31m".$array[$i][$j]."\e[0m");
      }
      else if($array[$i][$j] == "x") {
        echo("\e[32m".$array[$i][$j]."\e[0m");
      }
      else echo($array[$i][$j]);
    }
    echo("\n");
  }
}

// display map
function print_array(array $array): void {
  for($i = 0; $i < y; $i++) {
    for($j = 0; $j < x; $j++) {
      echo($array[$i][$j]);
    }
    echo("\n");
  }
}

// converts output to a 2 dimensions array
function convert(array &$output): void {
  $array = [];
  for($j = 0; $j < y; $j++) {
    array_push($array, str_split($output[$j]));
  }
  $output = $array;
}

// returns minimum parent
function minimum(int $int1, int $int2, int $int3): int {
  $array = [$int1, $int2, $int3];
  return min($array);
}

// see where i am
function test(): void {
  echo "here\n";
  exit();
}

// return coordinates of the first highest value
function find_highest(array $array): array {
  $data = [
    "max" => 0,
    "x" => 0,
    "y" => 0
  ];
  for($i = 0; $i < y; $i++) {
    for($j = 0; $j < x; $j++) {
      if($data["max"] < $array[$i][$j]) {
        $data["max"] = $array[$i][$j];
        $data["x"] = $j;
        $data["y"] = $i;
      }
      else continue;
    }
  }
  return $data;
}

// draws the square and updates the map
function draw_square(array &$output, array $coordinates): void {
  $goal_x = $coordinates["x"] - $coordinates["max"];
  $goal_y = $coordinates["y"] - $coordinates["max"];
  for($i = $coordinates["y"]; $goal_y < $i; $i--) {
    for($j = $coordinates["x"]; $goal_x < $j; $j--) {
      $output[$i][$j] = "x";
    }
  }
  for($i = 0; $i < y; $i++) {
    for($j = 0; $j < x; $j++) {
      if($output[$i][$j] != 0 && $output[$i][$j] != "x") {
        $output[$i][$j] = ".";
      }
      else if($output[$i][$j] == 0) {
        $output[$i][$j] = "o";
      }
    }
  }
}

// reads the map file and create an array
function convert_map_file(): array {
  $content = file_get_contents(file);
  $array = explode("\n", $content);
  array_shift($array);
  array_pop($array);
  return $array;
}

