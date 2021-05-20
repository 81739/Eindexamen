<?php 
include('server.php');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
		header('location: inschrijven.php');
	} else {
		header('location: overzicht.php');
	}
} else {
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
		<h2>Login </h2>
	</div>

	<form method="post" action="login.php">
		<?php include('errors.php') ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
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
}
?>
