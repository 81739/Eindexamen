<?php
// script bestand
include 'server.php';

// sessie verplicht
require 'session.php';

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
<?php
echo "<p><a href='logout.php'>Uitloggen</a></p>";
?>
    <h1>De Klapschaats</h1>
  
	<form method="post" action="blokken_toevoegen.php">
  <label for="datum">Datum:</label>
  <input type="date" id="datum" name="datum"><br><br>
  <label for="start">Start:</label>
  <input type="time" id="start" name="start"><br><br>
  <label for="end">Eind:</label>
  <input type="time" id="end" name="end"><br><br>
  <label for="slots">Slots:</label>
  <input type="text" id="slots" name="slots"><br><br>
  <div>
    <!-- hidden token toevoegen-->
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
  </div>
  <!-- <label for="email">Datum:</label> -->
  <!-- <input type="date" id="datum" name="datum" readonly><br><br>
  <label for="email">Blok:</label>
  <input type="time" id="time" name="time" readonly><br><br> -->
  <button type="submit" class="btn" name="blok_inschrijven">Inschrijven</button>      
<?php
// errors opslaan
include ('errors.php')
?>
<!-- stapje teruggaan -->
<button onClick="history.back();return false;">Terug</button>
  <?php
// De gelukt bericht laten zien
echo $_SESSION['gelukt'];
unset($_SESSION['gelukt']);
?>
</form>

</body>
</html>
