<?php 
// require 'session.php';
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
    <!-- <link rel="stylesheet" href="styling/styles.css"> -->
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body id="top" style="background-color:white;">
<a style="float: right;" href="login.php">Log in</a>


	
    <h1>De Klapschaats</h1>

	<form action="/action_page.php">
  <label for="datum">Kies datum:</label>
  <input type="date" id="datum" name="datum">
  <input type="submit">
</form>
 <?php
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
	    echo "<td><a href='inschrijven.php'>Inschrijven</a></td>";	    
	    echo "</tr>";
	}
	    echo "</table>";

	     
	    
	    ?>

</body>
</html>