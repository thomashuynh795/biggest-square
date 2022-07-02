<?php

$command = "perl script.pl ".$argv[1]." ".$argv[2]." ".$argv[3]." > map";
exec($command);
$command = "php bsq.php map";
$output = null;
exec($command, $output);

foreach($output as $value) {
    echo $value.PHP_EOL;
}

