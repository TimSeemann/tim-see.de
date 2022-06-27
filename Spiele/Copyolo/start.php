<!doctype html>
<html lang="de">
<head>
  <link rel="icon" href="../../Grafiken/icon.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Copyolo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    const spieler = [];
    function addPlayer(name){
      if(name!=="") {
        spieler.push(name);
        let li = document.createElement('li');
        li.innerHTML = name+"\n";
        li.id=name;
        let button = document.createElement("button");
        button.innerHTML="x";
        button.setAttribute("onClick","removePlayer(\""+name+"\")");
        li.appendChild(button);
        document.getElementById("player").appendChild(li);
        document.getElementById("formular").reset();
        localStorage.setItem("player", JSON.stringify(player));
      }
    }
    function removePlayer(name){
      spieler.splice(spieler.indexOf(name),1);
      document.getElementById(name).remove();
    }
    function start(){
      $.cookie('player',JSON.stringify(spieler));
      location.assign("spiel.php");
    }
  </script>
</head>
<body>
<p>
<form id="formular" action="javascript:addPlayer(pName.value)">
  <label for="pName">Spielername</label>
  <input type="text" id="pName" name="pName">
  <input type="submit" value="hinzufügen">
</form>
<p><a>Teilnehmer:</a></p>
<p><ul id="player"></ul>
<p><button onclick="start()">Start</button></p>
<p><a href="#">Neue Aufgabe hinzufügen</a></p>
</body>
</html>
