<?php 
session_start();

$username = "";
$errors   = array();

$db = mysqli_connect('localhost', '81739_eindexamen', 'Q8d&fp05', 'eindexamen');

if (isset($_POST['reg_user'])) {

	$username   = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// checking filled
	if (empty($username)) { 
		array_push($errors, "-Username is required");
	}

	if ($password_1 != $password_2) {
		array_push ($errors, "-Password you typed doesn't match");
	} 

	if (empty($password_1)) {
		array_push($errors, "-Password is required");
	}

	$user_check_query = "SELECT * FROM users WHERE gebruikersnaam='$username' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	// Checking user in database
	if ($user) {
		if ($user['gebruikersnaam'] === $username) {
			array_push($errors, "Username already exists");
		}
	}

	echo "Total error: " . count($errors);

	// Insert New Data
	if (count($errors) == 0) {
		$password = md5($password_1);

		$query = "INSERT INTO users (gebruikersnaam, wachtwoord) VALUES ('$username', '$password')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success']  = "You're now logged in";
		header('location: inschrijven.php');
	}

}

// Click Login
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);



	if (empty($username)) {
		array_push($errors, "Username is required");
	}

	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE gebruikersnaam='$username' AND wachtwoord='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_array($results);
		if (mysqli_num_rows($results) == 1) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['loggedin'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "You are now logged in";
            if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                header('location: inschrijven.php');
            } else {
                header('location: overzicht.php');
            }
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_POST['inschrijven'])) {
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['ja'];
    $blockID = $_POST['blockID'];

    // Insert New Data
	if (count($errors) == 0) {

		$query = "INSERT INTO profiles (fk_userID, voornaam, achternaam, email, telefoonnummer, adres, postcode, plaats, lid, blockID) VALUES ('$fk_userID' ,'$voornaam', '$achternaam', '$email', '$telefoonnummer', '$adres', '$postcode', '$plaats', '$lid', '$blockID')";
		mysqli_query($db, $query);
        $_SESSION['message'] = "U bent met succes ingeschreven!"; 
        header('location: inschrijven.php');
	}
}

if (isset($_POST['inschrijving_aanpassen'])) {
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['ja'];
    $blockID = $_POST['blockID'];

    // Insert New Data
	if (count($errors) == 0) {

		$query = "UPDATE profiles SET voornaam = '$voornaam', achternaam = '$achternaam', email = '$email', telefoonnummer = '$telefoonnummer', adres = '$adres', postcode = '$postcode', plaats = '$plaats', lid = '$lid', blockID = '$blockID' WHERE fk_userID = $fk_userID";
		mysqli_query($db, $query);
        $_SESSION['message'] = "Met succes aangepast!"; 
        header('location: overzicht.php');
	}
}

if (isset($_POST['inschrijving_annuleren'])) {
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['ja'];
    // $timeblock = $_POST['timeblock'];

    // Insert New Data
	if (count($errors) == 0) {

		$query = "DELETE FROM profiles WHERE fk_userID = $fk_userID";
		mysqli_query($db, $query);
        $_SESSION['message'] = "Met succes uitgeschreven!"; 
        header('location: index.php');
	}
}


?>