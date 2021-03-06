<?php

// Datei öffnen, $handle ist der Dateizeiger
$handle = fopen ('../../Daten/ausgabe/normal.csv','r');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<p><a id="ausgabe">Jetzt gehts los!!!</a></p>
<p><a><button onclick="weiter()">weiter</a></p>
<script>
    let elemente = <?php echo json_encode($elemente); ?>;
    const ausgabe = document.getElementById("ausgabe");
    const fak=2;
    const player= JSON.parse($.cookie('player'));
    console.log(player);
    function weiter(){
        if(elemente.length!==0) {
            const ran = Math.floor(Math.random() * (elemente.length));
            let befehl =String(elemente[ran]);
            if(befehl.indexOf("\"")!==-1){
                befehl=transformNumber(befehl,fak);
            }
            ausgabe.textConten
            if(befehl.indexOf("_p_")!==-1){
                befehl=transformName(befehl);
            }
            ausgabe.textContent = befehl;
            elemente.splice(ran, 1);
        }
        else{
            ausgabe.textContent="Das Spiel ist vorbei :)";
        }
        function transformNumber(string, faktor){
            var pos1 = string.indexOf("\"");
            var pos2 = string.lastIndexOf("\"");
            var alt = string.substring(pos1, pos2 + 1);
            var neu = parseInt(string.substring(pos1 + 1, pos2)) * faktor;
            return string.replace(alt, neu);
        }
        function transformName(string){
            const playerAuf = [];
            let count = 0;
            let pos = string.indexOf('_p_');
            while (pos !== -1) {
                count++;
                pos = string.indexOf('_p_', pos + 1);
            }
            for(var i=0;i<=count;i++){
                let rand = Math.floor(Math.random() * player.length);
                while(playerAuf.indexOf(player[rand])!==-1){
                    rand = Math.floor(Math.random() * player.length);
                }
                playerAuf.push(player[rand]);
            }
            while(string.indexOf("_p_")!==-1) {
                string = string.replace("_p_",playerAuf[count]);
                count--;
            }
            return string;
        }
    }
</script>
</body>
</html>

