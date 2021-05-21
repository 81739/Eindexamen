<?php
// script bestand
include 'server.php';

// sessie verplicht
require 'session.php';

// Als je ingelogd bent en je komt op deze pagina. word je doorverwezen naar een ander pagina.
if (isset($_SESSION['al_ingeschreven']) && $_SESSION['al_ingeschreven'] == true)
{
	// als je administrator bevoegdheden hebt word je doorverwezen naar de admin page
    if (isset($_SESSION['level']) && $_SESSION['level'] == '1')
    {
        header('location: overzicht.php');
    }
    else
    {
        header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php');
    }
}

 // random token voor beveiliging
$token = bin2hex(openssl_random_pseudo_bytes(32));
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
  <input type="hidden" id="id" name="id" value="
  <?php // via de sessie de user id oppakken 
  echo $_SESSION['user_id']; ?>"><br><br>
	<form method="post" action="inschrijven.php">
  <label for="naam">Voornaam:</label>
  <input type="text" id="voornaam" name="voornaam"><br><br>
  <label for="naam">Achternaam:</label>
  <input type="text" id="achternaam" name="achternaam"><br><br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="
  <?php // Via de sessie gebruikersnaam oppakken
  echo $_SESSION['username']; ?>"><br><br>
  <label for="telefoonnummer">Telefoonnummer:</label>
  <input type="text" id="telefoonnummer" name="telefoonnummer"><br><br>
  <label for="adres">Adres:</label>
  <input type="text" id="adres" name="adres"><br><br>
  <label for="plaats">Postcode:</label>
  <input type="text" id="postcode" name="postcode"><br><br>
  <label for="plaats">Plaats:</label>
  <input type="text" id="plaats" name="plaats"><br><br>
  <p>Als u niet lid bent moet u een toegangsprijs van €4,95 betalen</p>
  <!-- als je per ongeluk aangevinkt hebt kan je unvinken met javascript -->
  <p>Bent u lid?:   <input type="radio" id="ja" name="ja" value="ja"><label for="ja">Ja</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type=button value="Uncheck" onclick="document.getElementById('ja').checked = false">
  <br>
  <?php
  // Haal data op
  $sql = "SELECT * FROM blocks";
  $result = mysqli_query($db, $sql);
  
  if (mysqli_num_rows($result) > 0)
  {
      // output van elke rij
      
      echo "<br><p>Voor welke blok kiest u?</p><br><select name='block'>";
 
  
      while ($row = mysqli_fetch_assoc($result))
      {
      // data van elke rij
      // echo "<td>" . $row['datum'] . "</td>";
      // echo "<td>" . $row['blok'] . "</td>";
      echo "<option name='block' value=" . $row['block'] . ">" . $row['date'] . " " . $row['start'] . " " . $row['end'] . "</option>";
      }
      echo "</select>";
  }
  else
  {
      echo "0 results";
  }
  
  // verbreek de verbinding
  mysqli_close($db);
  
  ?>

  </p>
  <div>
    <!-- hidden token toevoegen-->
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
  </div>
  <!-- <label for="email">Datum:</label> -->
  <!-- <input type="date" id="datum" name="datum" readonly><br><br>
  <label for="email">Blok:</label>
  <input type="time" id="time" name="time" readonly><br><br> -->
  <button type="submit" class="btn" name="inschrijven">Inschrijven</button>      
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
