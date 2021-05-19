<?php 
// require 'session.php';
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
<body id="top" style="background-color:white;">


	
    <h1>De Klapschaats</h1>
	<form action="/action_page.php">
  <label for="naam">Naam:</label>
  <input type="text" id="naam" name="naam"><br><br>
  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres"><br><br>
  <label for="plaats">Plaats:</label>
  <input type="text" id="plaats" name="plaats"><br><br>
  <label for="telefoonnummer">Telefoonnummer:</label>
  <input type="text" id="telefoonnummer" name="telefoonnummer"><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email"><br><br>
  <p>Bent u lid?:   <input type="radio" id="ja" name="ja" value="ja"><label for="ja">Ja</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type=button value="Uncheck" onclick="document.getElementById('ja').checked = false">
  <br>
</p>
<label for="email">Datum:</label>
  <input type="date" id="datum" name="datum" readonly><br><br>
  <label for="email">Blok:</label>
  <input type="time" id="time" name="time" readonly><br><br>
  <input type="submit" value="Verzend">               
  
  <?php
  echo "<p><a href='index.php'>terug</a></p>";
  ?>

</form>

		<!-- log out -->
        
        
        
        <!-- <a style="float: right;" href="logout.php">Logout</a> -->

</body>
</html>