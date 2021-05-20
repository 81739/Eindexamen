<?php 
// voeg de server file toe
include('server.php')
// sessie starten
// session_start();
// nieuwe token maken
// $token = bin2hex(openssl_random_pseudo_bytes(32));
// $_SESSION['token'] = $token;
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
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="registreren.php">
		<?php include('errors.php') ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>