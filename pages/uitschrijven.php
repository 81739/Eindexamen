<?php 
include('server.php');
require 'session.php';
$id = $_GET['id'];
$query = "SELECT * FROM profiles WHERE fk_userID = '$id'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_array($result);
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
	<form method="post" action="inschrijving_aanpassen.php">
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
  <p>Lid?:   
    <select name="lid" id="lid" readonly>
	  <option value="ja" <?php if($user['lid']=="ja") { echo "selected"; } ?>>Ja</option>
	  <option value="nee" <?php if($user['lid']=="") { echo "selected"; } ?>>Nee</option>
  </select>
  <br>
</p>
<!-- <label for="email">Datum:</label> -->
  <!-- <input type="date" id="datum" name="datum" readonly><br><br>
  <label for="email">Blok:</label>
  <input type="time" id="time" name="time" readonly><br><br> -->
  <p>Wilt u de volgende inschrijving annuleren?</p>
  <button type="submit" class="btn" name="inschrijving_annuleren">Uitschrijven</button>              
  <?php include('errors.php') ?>
  <button onClick="history.back();return false;">Terug</button>

</form>

		<!-- log out -->
        
        
        
        <!-- <a style="float: right;" href="logout.php">Logout</a> -->

</body>
</html>