<?php
// voeg de server file toe
include 'server.php';

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
		<h2>Register</h2>
	</div>

	<!-- Via post data doorsturen -->
	<form method="post" action="registreren.php">
	<!-- als er errors zijn -->
		<?php include ('errors.php') ?>
		<div class="input-group">
			<label>Username</label>
			<input class="border border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input class="bg-gray200" type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input class="bg-gray200" type="password" name="password_2">
		</div>
		<div class="input-group">
			<button class="bg-gray200" type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<div>
            <!-- hidden token toevoegen-->
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
