<?php 
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
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<a style="float: right;" href="logout.php">Uitloggen</a>


	
    <h1>Blokken aanpassen</h1>
 <?php
                echo "<p><a href='blokken.php'>blokken toevoegen</a></p>";

	     require ('config.inc.php');
	     $query = "SELECT * FROM blokken";
		 $result = mysqli_query($mysqli, $query);
		 
		 

	    //tabelrij
	    echo "<table>";
		echo "<tr>";
		echo "<th>datum</th>";
		echo "<th>start</th>";
		echo "<th>einde</th>";
		echo "<th>inschrijven</th>";
		echo "</tr>";
	    
	    
	while ($row = mysqli_fetch_array($result))
	    {
	        echo "<tr>";
	        
			//cellen
		echo "<td>" . $row['datum'] . "</td>";
		echo "<td>" . $row['begin'] . "</td>";
		echo "<td>" . $row['einde'] . "</td>";
	    echo "<td><a href='blokken_aanpassen.php'>aanpassen</a></td>";	    
	    echo "</tr>";
	}
	    echo "</table>";

	     
	    
	    ?>

</body>
</html>