<?php

$file = fopen("tempdata.txt", "r+") or die("Unable to openm file");

$lines = file_get_contents("tempdata.txt");
$text = explode('\n', $lines);

$text[1] = "shnega";
$rettext = implode('\n', $text);
echo $rettext;
//file_put_contents($lines , implode("\n", $lines));

fclose($file);
?>