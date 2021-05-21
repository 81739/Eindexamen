<?php
// script bestand
include 'server.php';

// sessie verplicht
require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
	    
    <meta charset="utf-8">
    <title>Overzicht</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

<?php
echo "<p><a href='blokken.php'>blokken</a></p>";
echo "<p><a href='logout.php'>Uitloggen</a></p>";
echo $_SESSION['message'];
unset($_SESSION['message']);

?>
<h1>De Klapschaats</h1>

<?php
// ID krijgen via de url
$blockID = $_GET['id'];
// Haal data op
$sql = "SELECT * FROM profiles WHERE blockID = '$blockID'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    // output van elke rij
    echo "<table>";
    echo "<tr>";
    // echo "<th>Datum</th>";
    // echo "<th>Blok</th>";
    echo "<th>Voornaam</th>";
    echo "<th>Achternaam</th>";
    echo "<th>Email</th>";
    echo "<th>Telefoonnummer</th>";
    echo "<th>Adres</th>";
    echo "<th>Postcode</th>";
    echo "<th>Plaats</th>";
    echo "<th>Lid?</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result))
    {
    // data van elke rij
    // echo "<td>" . $row['datum'] . "</td>";
    // echo "<td>" . $row['blok'] . "</td>";
    echo "<td>" . $row['voornaam'] . "</td>";
    echo "<td>" . $row['achternaam'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['telefoonnummer'] . "</td>";
    echo "<td>" . $row['adres'] . "</td>";
    echo "<td>" . $row['postcode'] . "</td>";
    echo "<td>" . $row['plaats'] . "</td>";
    echo "<td>" . $row['lid'] . "</td>";
    echo "<td>" . "<a href='inschrijving_aanpassen.php?id=" . $row['fk_userID'] . "'>aanpassen</a>" . "</td>";
    echo "<td>" . "<a href='uitschrijven.php?id=" . $row['fk_userID'] . "'>uitschrijven</a>" . "</td>";
    echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "0 results";
}

// verbreek de verbinding
mysqli_close($db);

?>

</body>
</html>
