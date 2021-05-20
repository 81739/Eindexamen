<?php
require 'server.php';
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
    <!-- <link rel="stylesheet" href="../../../website/css/base.css"> -->

</head>
<body id="top" style="background-color:white;">

<?php
               echo "<p><a href='blokken.php'>blokken aanpassen</a></p>";
               echo "<p><a href='overzicht_download.php'>Overzicht downloaden</a></p>";
               echo "<p><a href='logout.php'>Uitloggen</a></p>";
               echo $_SESSION['message'];
?>

	
    <h1>De Klapschaats</h1>

<?php
// $servername = "localhost";
// $username = "81739_eindexamen";
// $password = "Q8d&fp05";
// $dbname = "eindexamen";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$sql = "SELECT * FROM profiles";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
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
        
    while($row = mysqli_fetch_assoc($result)) {
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
} else {
    echo "0 results";
}

mysqli_close($db);

	    ?>

</body>
</html>