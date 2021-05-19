<?php


session_start();


if(!isset($_SESSION['Gebruikersnaam']))

{
	header("location: index.php");
}

else

{

	echo "<p id='welkom'>Welkom, " . $_SESSION['Gebruikersnaam'] . "</p>";

}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>81739 - Rohied Shirzai</title>
	<style>
		#welkom{
			position: fixed;
			color: black;
			margin-top: 20px;
			margin-left: 91.5%;
		}
	</style>
	
</head>

<body>
</body>
</html>