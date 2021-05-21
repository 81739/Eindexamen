<?php
// script bestand
include 'server.php';

// sessie verplicht
require 'session.php';

// ID krijgen via de url
$id = $_GET['id'];

// de query om de profiel erbij op te zoeken
$query = "SELECT * FROM blocks WHERE block = '$id'";

// resulaten
$result = mysqli_query($db, $query);
$block = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	    
    <meta charset="utf-8">
    <title>De Klapschaats</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<a style="float: right;" href="logout.php">Uitloggen</a>


	
    <h1>Blokken aanpassen</h1>

    <form method="post" action="blokken_aanpassen.php">
    <!-- Via php data inladen van database -->
    <label for="naam">Blok ID:</label>
    <input type="number" id="block" name="block" value="<?php echo $block['block']; ?>" readonly><br><br>
    <label for="naam">Date:</label>
    <input type="date" id="datum" name="datum" value="<?php echo $block['date']; ?>"><br><br>
    <label for="naam">Begin:</label>
    <input type="time" id="start" name="start" value="<?php echo $block['start']; ?>"><br><br>
    <label for="naam">Einde:</label>
    <input type="time" id="end" name="end" value="<?php echo $block['end']; ?>"><br><br>
    <label for="naam">Plekken:</label>
    <input type="number" id="slots" name="slots" value="<?php echo $block['slots']; ?>"><br><br>
    <button type="submit" class="btn" name="block_aanpassen">Aanpassen</button><br><br>
    <button type="submit" class="btn" name="block_verwijderen">Verwijderen</button>      
<br><br><br>



    <input type="number" id="groep" name="groep" value="aantal inschrijven voor deze blok"><br><br>
    <button type="submit" class="btn" name="groep_inschrijven">Aantal inschrijven</button>      

    <!-- stapje teruggaan -->
    <button onClick="history.back();return false;">Terug</button>
    

</body>
</html>
