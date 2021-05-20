<?php 
include('server.php');
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
    <!-- <link rel="stylesheet" href="../../../website/css/base.css"> -->

</head>
<body>
<?php
echo "<p><a href='logout.php'>Uitloggen</a></p>";
	?>
    <h1>De Klapschaats</h1>
  <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['user_id']; ?>"><br><br>
	<form method="post" action="inschrijven.php">
  <label for="naam">Voornaam:</label>
  <input type="text" id="voornaam" name="voornaam"><br><br>
  <label for="naam">Achternaam:</label>
  <input type="text" id="achternaam" name="achternaam"><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $_SESSION['username']; ?>"><br><br>
  <label for="telefoonnummer">Telefoonnummer:</label>
  <input type="text" id="telefoonnummer" name="telefoonnummer"><br><br>
  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres"><br><br>
  <label for="plaats">Postcode:</label>
  <input type="text" id="postcode" name="postcode"><br><br>
  <label for="plaats">Plaats:</label>
  <input type="text" id="plaats" name="plaats"><br><br>
  <p>Als u niet lid bent moet u een toegangsprijs van €4,95 betalen</p>
  <p>Bent u lid?:   <input type="radio" id="ja" name="ja" value="ja"><label for="ja">Ja</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type=button value="Uncheck" onclick="document.getElementById('ja').checked = false">
  <br>
</p>
<!-- <label for="email">Datum:</label> -->
  <!-- <input type="date" id="datum" name="datum" readonly><br><br>
  <label for="email">Blok:</label>
  <input type="time" id="time" name="time" readonly><br><br> -->
  <button type="submit" class="btn" name="inschrijven">Inschrijven</button>              
  <?php include('errors.php') ?>
  <button onClick="history.back();return false;">Terug</button>
  <?php
  echo $_SESSION['message'];
?>
</form>

		<!-- log out -->
        
        
        
    <!-- <a style="float: right;" href="logout.php">Logout</a> -->

</body>
</html>