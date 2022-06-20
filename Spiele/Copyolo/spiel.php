<?php

// Datei öffnen, $handle ist der Dateizeiger
$handle = fopen ('../../Daten/ausgabe/anzahl_0.csv','r');
$elemente = array();
while (($line = fgetcsv($handle)) !== FALSE) {
    array_push($elemente,$line);
}
fclose($handle);
?>
<html lang="de">
<head>
    <link rel="icon" href="../../Grafiken/icon.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links zu den Unterseiten</title>
</head>
<body>
<p><a id="ausgabe">Jetzt gehts los!!!</a></p>
<p><a><button onclick="weiter()">weiter</a></p>
<script>
    let elemente = <?php echo json_encode($elemente); ?>;
    const ausgabe = document.getElementById("ausgabe");
    function weiter(){
        if(elemente.length!==0) {
            var ran = Math.floor(Math.random() * (elemente.length));
            ausgabe.textContent = elemente[ran];
            elemente.splice(ran, 1);
        }
        else{
            ausgabe.textContent="Das Spiel ist vorbei :)";
        }
    }
</script>
</body>
</html>

