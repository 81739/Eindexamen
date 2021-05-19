<?php
// sessie starten
// session_start();
// nieuwe token maken
// $token = bin2hex(openssl_random_pseudo_bytes(32));
// $_SESSION['token'] = $token;
// require 'config.inc.php';
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
?>

	
    <h1>De Klapschaats</h1>

<?php
$servername = "localhost";
$username = "81739_eindexamen";
$password = "Q8d&fp05";
$dbname = "eindexamen";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM inschrijvingen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>";
		echo "<tr>";
		echo "<th>naam</th>";
        echo "<th>adres</th>";
        echo "<th>plaats</th>";
        echo "<th>telefoonnummer</th>";
        echo "<th>email</th>";
        echo "<th>lid?</th>";
        echo "<th>datum</th>";
        echo "<th>blok</th>";
        echo "<th>uitschrijven</th>";
		echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<td>" . $row['naam'] . "</td>";
        echo "<td>" . $row['adres'] . "</td>";
        echo "<td>" . $row['plaats'] . "</td>";
        echo "<td>" . $row['telefoonnummer'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['lid'] . "</td>";	
        echo "<td>" . $row['datum'] . "</td>";
        echo "<td>" . $row['blok'] . "</td>";
        echo "<td>" . "<a href='uitschhrijven.php'>uitschrijven</a>" . "</td>";		 	    
	    echo "</tr>";
	        }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);

	    //  require ('config.inc.php');
	    //  $query = "SELECT * FROM inschrijvingen";
		//  $result = $conn->query($sql);
		//  if ($result->num_rows > 0) {
		// 	// output data of each row
		// 	while($row = $result->fetch_assoc()) {
		// 	  echo "datum: " . $row["naam"]. " - tijd: " . $row["adres"]. "<br>";
		// 	}
		//   } else {
		// 	echo "0 results";
		//   }

	    ?>

</body>
</html>