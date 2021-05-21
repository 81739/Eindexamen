<?php
// script bestand
include 'server.php';

// sessie verplicht
require 'session.php';

// ID krijgen via de url
$id = $_GET['id'];

// de query om de profiel erbij op te zoeken
$query = "SELECT * FROM profiles WHERE fk_userID = '$id'";

// resulaten
$result = mysqli_query($db, $query);
$user = mysqli_fetch_array($result);

// de block id opslaan
$blockID = $user['blockID'];

// tweede query om data van tweede tabel op te halen
$query2 = "SELECT * FROM blocks WHERE block = '$blockID'";
$result2 = mysqli_query($db, $query2);
$user2 = mysqli_fetch_array($result2);

// de gegevens opslaan
$start = $user2['start'];
$end = $user2['end'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>De Klapschaats</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>


	
    <h1>De Klapschaats</h1>
  <!-- Via post data doorsturen -->
	<form method="post" action="uitschrijven.php">
  <!-- Via php data inladen van database -->
  <input type="hidden" id="id" name="id" value="<?php echo $user['fk_userID']; ?>" readonly><br><br>
  <label for="naam">Voornaam:</label>
  <input type="text" id="voornaam" name="voornaam" value="<?php echo $user['voornaam']; ?>" readonly><br><br>
  <label for="naam">Achternaam:</label>
  <input type="text" id="achternaam" name="achternaam" value="<?php echo $user['achternaam']; ?>" readonly><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>" readonly><br><br>
  <label for="telefoonnummer">Telefoonnummer:</label>
  <input type="text" id="telefoonnummer" name="telefoonnummer" value="<?php echo $user['telefoonnummer']; ?>" readonly><br><br>
  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres" value="<?php echo $user['adres']; ?>" readonly><br><br>
  <label for="plaats">Postcode:</label>
  <input type="text" id="postcode" name="postcode" value="<?php echo $user['postcode']; ?>" readonly><br><br>
  <label for="plaats">Plaats:</label>
  <input type="text" id="plaats" name="plaats" value="<?php echo $user['plaats']; ?>" readonly><br><br>
  <!-- Via select wijzigen -->
  <p>Lid?:   
    <select name="lid" id="lid" required readonly>
	  <option value="ja" <?php if ($user['lid'] == "ja")
{
    echo "selected";
} ?>>Ja</option>
	  <option value="nee" <?php if ($user['lid'] == "nee")
{
    echo "selected";
} ?>>Nee</option>
  </select>
  <br>
  <input type="hidden" id="block" name="block" value="<?php echo $user['blockID']; ?>"><br><br>
</p>
<label for="inschrijving">inschrijving:</label>
<!-- de blok met datum en tijd formaat laten zien -->
<label for="datum">Datum:</label><input type="date" id="datum" name="datum" value="<?php echo $user2['date']; ?>" readonly><br><br>
<label for="blok">Van:</label><input type="text" id="blok" name="blok" value="<?php echo date('g:i A ', strtotime($start)); ?>" readonly><br><br>
<label for="blok">Tot:</label><input type="text" id="blok" name="blok" value="<?php echo date('g:i A ', strtotime($end)); ?>" readonly><br><br>

  <p>Wilt u de volgende inschrijving annuleren?</p>
  <button type="submit" class="btn" name="uitschrijven">Uitschrijven</button>          
<?php
// errors opslaan
include ('errors.php')
?>
<!-- stapje teruggaan -->
  <button onClick="history.back();return false;">Terug</button>
  <?php
// De gelukt bericht laten zien
echo $_SESSION['gelukt'];
?>
</form>

</body>
</html>
