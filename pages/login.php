<?php
// script bestand
include 'server.php';

// Als je ingelogd bent en je komt op deze pagina. word je doorverwezen naar een ander pagina.
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
	// als je administrator bevoegdheden hebt word je doorverwezen naar de admin page
    if (isset($_SESSION['level']) && $_SESSION['level'] == '1')
    {
        header('location: overzicht.php');
    }
    else
    {
        header('location: inschrijven.php');
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


</head>
<body>
	<div class="header">
		<h2>Login </h2>
	</div>

	<!-- Via post data doorsturen -->
	<form method="post" action="login.php">
		<?php include ('errors.php') ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div>
            <!-- hidden token toevoegen-->
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member ? <a href="registreren.php">Sign Up</a>
		</p>
	</form>
</body>
</html>
<?php

?>
