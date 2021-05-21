<?php
//sessie starten
session_start();

// module voor pdf
require('fpdf.php');

$username = "";
$errors = array();

// Database connectie
$db = mysqli_connect('localhost', '81739_eindexamen', 'Q8d&fp05', 'eindexamen');

// registreren
if (isset($_POST['reg_user']))
{

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // checking filled
    if (empty($username))
    {
        array_push($errors, "-Username is required");
    }

    if ($password_1 != $password_2)
    {
        array_push($errors, "-Password you typed doesn't match");
    }

    if (empty($password_1))
    {
        array_push($errors, "-Password is required");
    }

    $user_check_query = "SELECT * FROM users WHERE gebruikersnaam='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // Checking user in database
    if ($user)
    {
        if ($user['gebruikersnaam'] === $username)
        {
            array_push($errors, "Username already exists");
        }
    }

    echo "Total error: " . count($errors);

    // Insert New Data
    if (count($errors) == 0)
    {
        $password = md5($password_1);

        $query = "INSERT INTO users (gebruikersnaam, wachtwoord) VALUES ('$username', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You're now logged in";
        header('location: inschrijven.php');
    }

}

// inloggen
if (isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username))
    {
        array_push($errors, "Username is required");
    }

    if (empty($password))
    {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0)
    {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE gebruikersnaam='$username' AND wachtwoord='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) == 1)
        {
            $_SESSION['level'] = $user['level'];
            $_SESSION['id'] = $user['ID'];
            $_SESSION['loggedin'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['error'] = $username;

            if (isset($_SESSION['level']) && $_SESSION['level'] == '1')
            {
                $user_check_query = "SELECT * FROM profiles WHERE email='$username' LIMIT 1";
                $result = mysqli_query($db, $user_check_query);
                $user = mysqli_fetch_assoc($result);

                // Checking user in database
                if ($user)
                {
                    if ($user['email'] === $username)
                    {
                        header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $id);
                    }
                    else
                    {
                        header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $id);
                    }
                }
            }
            else
            {
                header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $id);
            }
        }
        else
        {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// inschrijven
if (isset($_POST['inschrijven']))
{
    $fk_userID = $_POST['user_id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['ja'];
    $blockID = $_POST['block'];
    $id = $_SESSION['id'];
    // Insert New Data
    // Als je ingelogd bent en je komt op deze pagina. word je doorverwezen naar een ander pagina.
    $user_check_query = "SELECT * FROM blocks WHERE block = '$blockID'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    $slots = $user['slots'];
    if (($slots) > 0)
    {
        if (count($errors) == 0)
        {

            $query = "INSERT INTO profiles (fk_userID, voornaam, achternaam, email, telefoonnummer, adres, postcode, plaats, lid, blockID) VALUES ('$id' ,'$voornaam', '$achternaam', '$email', '$telefoonnummer', '$adres', '$postcode', '$plaats', '$lid', '$blockID')";
            mysqli_query($db, $query);
            $_SESSION['gelukt'] = "Gelukt";
            // $_SESSION['al_ingeschreven'] = "true";
            header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $_SESSION['id']);
        }
    } else{
        echo "slots zijn helaas vol";
    }
}

// blok inschrijven
if (isset($_POST['blok_inschrijven']))
{

    $datum = $_POST['datum'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $slots = $_POST['slots'];
    $id = $_SESSION['id'];
    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "INSERT INTO blocks (date, start, end, slots) VALUES ('$datum' ,'$start', '$end', '$slots')";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = "Gelukt";
        // $_SESSION['al_ingeschreven'] = "true";
        header('location: blokken.php');
    }
}


// de gegevens aanpassen
if (isset($_POST['inschrijving_aanpassen']))
{
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['lid'];
    $blockID = $_POST['block'];
    $id = $_SESSION['id'];

    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "UPDATE profiles SET voornaam = '$voornaam', achternaam = '$achternaam', email = '$email', telefoonnummer = '$telefoonnummer', adres = '$adres', postcode = '$postcode', plaats = '$plaats', lid = '$lid', blockID = '$blockID' WHERE fk_userID = '$fk_userID'";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = "Met succes aangepast!";
        header('location: overzicht.php');
    }
}

// de gegevens aanpassen bezoeker only
if (isset($_POST['inschrijving_aanpassen_bezoeker']))
{
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['lid'];
    $blockID = 2;
    $id = $_SESSION['id'];

    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "UPDATE profiles SET voornaam = '$voornaam', achternaam = '$achternaam', email = '$email', telefoonnummer = '$telefoonnummer', adres = '$adres', postcode = '$postcode', plaats = '$plaats', lid = '$lid', blockID = '$blockID' WHERE fk_userID = '$fk_userID'";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = "Met succes aangepast!";
        header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $_SESSION['id']);
    }
}


// uitschrijven
if (isset($_POST['uitschrijven']))
{
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
    if (count($errors) == 0)
    {
        $query = "DELETE FROM profiles WHERE fk_userID = '$fk_userID'";
        mysqli_query($db, $query);
        $_SESSION['message'] = $query;
        $_SESSION['gelukt'] = "Met succes uitgeschreven!";
        header('location: overzicht.php');
    }
    
}

// uitschrijven bezoeker only
if (isset($_POST['uitschrijven_bezoeker']))
{
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['ja'];
    $id = $_SESSION['id'];
    // $timeblock = $_POST['timeblock'];
    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "DELETE FROM profiles WHERE fk_userID = '$fk_userID'";
        mysqli_query($db, $query);
        $_SESSION['message'] = $query;
        $_SESSION['gelukt'] = "Met succes uitgeschreven!";
        header('location: inschrijving_bezoeker_aanpassen_of_verwijderen.php?id=' . $_SESSION['id']);
    }
}


// bevestigings pdf bestand
if (isset($_POST['bevestiging']))
{
    $fk_userID = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $lid = $_POST['lid'];
    $blockID = $_POST['blockID'];
    $date = $_POST['datum'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $start_format = date('g:i A ', strtotime($start));
    $end_format = date('g:i A ', strtotime($end));

    // de query om de profiel erbij op te zoeken
    $query = "SELECT * FROM blocks WHERE block = '$blockID'";

    // resulaten
    $result = mysqli_query($db, $query);
    $user = $row = mysqli_fetch_assoc($result);    

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Uw bevestiging!',0,2);
$pdf->Cell(0,10,'Voornaam:'.$voornaam,0,2);
$pdf->Cell(0,10,'Achternaam:'.$achternaam,0,2);
$pdf->Cell(0,10,'E-mail:'.$email,0,2);
$pdf->Cell(0,10,'Telefoonnummer:'.$telefoonnummer,0,2);
$pdf->Cell(0,10,'Adres:'.$adres,0,2);
$pdf->Cell(0,10,'Postcode:'.$postcode,0,2);
$pdf->Cell(0,10,'Plaats:'.$plaats,0,2);
$pdf->Cell(0,10,'Lid?:'.$lid,0,2);
$pdf->Cell(0,10,'Datum:'.$date,0,2);
$pdf->Cell(0,10,'Start:'.$start_format,0,2);
$pdf->Cell(0,10,'End:'.$end_format,0,2);
$pdf->Output();
}

// de block aanpassen
if (isset($_POST['block_aanpassen']))
{
    $block = $_POST['block'];
    $datum = $_POST['datum'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $datum_format = strtotime( $datum );
    $start_format = strtotime( $start );
    $end_format = strtotime( $end );

    $slots = $_POST['slots'];


    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "UPDATE blocks SET date = '$datum', start = '$start', end = '$end', slots = '$slots' WHERE block = '$block'";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = $query;

        header('location: blokken.php');
    }
}

// groep inschrijven
if (isset($_POST['groep_inschrijven']))
{
    $block = $_POST['block'];
    $slots = $_POST['slots'];
    $aantal = $_POST['groep'];
    $inschrijven = $slots - $aantal;


    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "UPDATE blocks SET slots = '$inschrijven' WHERE block = '$block'";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = "Met succes aangepast!";

        header('location: blokken.php');
    }
}

// block verwijderen
if (isset($_POST['block_verwijderen']))
{
    $block = $_POST['block'];

    // Insert New Data
    if (count($errors) == 0)
    {

        $query = "DELETE FROM blocks WHERE block = '$block'";
        mysqli_query($db, $query);
        $_SESSION['gelukt'] = "Met succes aangepast!";

        header('location: blokken.php');
    }
}


?>

