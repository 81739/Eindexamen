<?php
// sessie starten
// session_start();
// nieuwe token maken
// $token = bin2hex(openssl_random_pseudo_bytes(32));
// $_SESSION['token'] = $token;
// require 'config.inc.php';
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

	<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-9 text-left"> 
     <h1>Inloggen</h1>
     <hr>
     <form method="POST" action="login_verwerk.php">
        <table>
            <tr>
                <td>Gebruikersnaam:</td>
                <td><input type="text" name="naamveld"/></td>
            </tr>
            <tr>
                <td>Wachtwoord:</td>
                <td><input type="text" name="wachtwoordveld"/></td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="verstuurknop" value="LOG IN" class="btn-success"/></td>
            </tr>
            <tr>
            <!-- hidden token toevoegen-->
            <td><input type="hidden" name="csrf_token" value="<?php echo $token; ?>"></td>
            </tr>
        </table>
    </form>

		<!-- log out -->
        
        
        
        <!-- <a style="float: right;" href="logout.php">Logout</a> -->

</body>
</html>