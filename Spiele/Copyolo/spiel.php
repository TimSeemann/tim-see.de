<?php

// Datei öffnen, $handle ist der Dateizeiger
$handle = fopen ('../../Daten/ausgabe/anzahl_0.csv','r');
$elemente = array();
while (($line = fgetcsv($handle)) !== FALSE) {
    array_push($elemente,$line);
}
echo implode(', ', array_values($elemente[rand(0,count($elemente)-1)]));
fclose($handle);
?>