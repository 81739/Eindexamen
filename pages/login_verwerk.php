<?php
// session_start();
require 'config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, iniÍtial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
</head>
<body>

  
         <h1>INLOG</h1>
        <?php 
	    
	    if (isset($_POST['verstuurknop']))
	        {
	            require('config.inc.php');
	                $Gebruikersnaam = $_POST['naamveld'];
	                $Wachtwoord = $_POST['wachtwoordveld'];
	        
	    if(strlen($Gebruikersnaam) > 0 && strlen($Wachtwoord) > 0){
	                $_SESSION['use'] = $Gebruikersnaam;
	                $opdracht = "SELECT * FROM users WHERE gebruikersnaam = '$Gebruikersnaam' AND wachtwoord = '$Wachtwoord'";

	                $resultaat = mysqli_query($mysqli, $opdracht);
	        
	    if (mysqli_num_rows($resultaat) > 0){
	            
            header("Location: overzicht.php");
	        }
	    }

	    else {
	        echo "<p>Er is iets fout gegaan bij het inloggen.</p>";
			echo "<p>Uw naam en/of wachtwoord is niet goed.</p>";
			echo "<p><a href='login.php'>Opnieuw proberen</a></p>";
	        }
	    }
	    
	    
	?>




</form>
</body>
</html>
