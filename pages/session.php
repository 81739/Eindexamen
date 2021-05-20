<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['message'] = "U moet ingelogd zijn om deze pagina te bekijken";
	header('location: login.php');
}
?>
