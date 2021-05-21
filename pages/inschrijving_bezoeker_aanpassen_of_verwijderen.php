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

// $blockID = $user['blockID'];
// $query2 = "SELECT * FROM blocks WHERE block = '$blockID'";
// $result2 = mysqli_query($db, $query2);
// $user2 = mysqli_fetch_array($result2);
// $start = $user2['start'];
// $end = $user2['end'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>De Klapschaats</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<p><a href='logout.php'>Uitloggen</a></p>

	
  <h1>De Klapschaats</h1>
  <!-- Via post data doorsturen -->
	<form method="post" action="inschrijving_aanpassen.php">
  <!-- Via php data inladen van database -->
  <input type="hidden" id="id" name="id" value="<?php echo $user['fk_userID']; ?>"><br><br>
  <label for="naam">Voornaam:</label>
  <input type="text" id="voornaam" name="voornaam" value="<?php echo $user['voornaam']; ?>"><br><br>
  <label for="naam">Achternaam:</label>
  <input type="text" id="achternaam" name="achternaam" value="<?php echo $user['achternaam']; ?>"><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
  <label for="telefoonnummer">Telefoonnummer:</label>
  <input type="text" id="telefoonnummer" name="telefoonnummer" value="<?php echo $user['telefoonnummer']; ?>"><br><br>
  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres" value="<?php echo $user['adres']; ?>"><br><br>
  <label for="plaats">Postcode:</label>
  <input type="text" id="postcode" name="postcode" value="<?php echo $user['postcode']; ?>"><br><br>
  <label for="plaats">Plaats:</label>
  <input type="text" id="plaats" name="plaats" value="<?php echo $user['plaats']; ?>"><br><br>
  <!-- Via select wijzigen -->
  <p>Lid?:   
    <select name="lid" id="lid" required>
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
<label for="start">Van:</label><input type="text" id="start" name="start" value="<?php echo date('g:i A ', strtotime($start)); ?>" readonly><br><br>
<label for="end">Tot:</label><input type="text" id="end" name="end" value="<?php echo date('g:i A ', strtotime($end)); ?>" readonly><br><br>

  <p>Wat wilt u doen?</p>
  <button type="submit" class="btn" name="inschrijving_aanpassen_bezoeker">Aanpassen</button>
  <button type="submit" class="btn" name="bevestiging">Download je bevestings bestand</button>
  <button type="submit" class="btn" name="uitschrijven_bezoeker">Uitschrijven</button>
  <?php
?>                        
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
