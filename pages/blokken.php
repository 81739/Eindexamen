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
    <title>De Klapschaats</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<a style="float: right;" href="logout.php">Uitloggen</a>


	
 <?php
echo "<p><a href='blokken_toevoegen.php'>Blokken toevoegen</a></p>";

// Haal data op
$sql = "SELECT * FROM blocks";
$result = mysqli_query($db, $sql);

echo $_SESSION['gelukt'];
unset($_SESSION['gelukt']);

if (mysqli_num_rows($result) > 0)
{
    // output van elke rij
    echo "<table>";
    echo "<tr>";
    echo "<th>Blok</th>";
    echo "<th>Datum</th>";
    echo "<th>Begin:</th>";
    echo "<th>Eind:</th>";
    echo "<th>Plekken:</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result))
    {
    // data van elke rij
    echo "<td>" . $row['block'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['start'] . "</td>";
    echo "<td>" . $row['end'] . "</td>";
    echo "<td>" . $row['slots'] . "</td>";
    echo "<td>" . "<a href='blokken_aanpassen.php?id=" . $row['block'] . "'>aanpassen</a>" . "</td>";
    echo "<td>" . "<a href='overzicht_ingeschreven_blok.php?id=" . $row['block'] . "'>inschrijvingen bekijken</a>" . "</td>";
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
echo "<p><a href='overzicht.php'>terug naar overzicht</a></p>";

?>

</body>
</html>
