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
    <link rel="stylesheet" href="../../../website/css/base.css">

</head>
<body id="top" style="background-color:white;">


	
    <h1>De Klapschaats</h1>
	<!-- <form action="/action_page.php">
  <label for="birthday">Datum:</label>
  <input type="date" id="date" name="date">
  <input type="submit" value="Laat blokken zien">
</form> -->

 <?php
	     require ('config.inc.php');
	     $query = "SELECT * FROM blokken";
	     $result = mysqli_query($mysqli, $query);
	    //tabelrij
	    echo "<table class=table-responsive>";
	    echo "<tr>";
	    echo "<th>tijd</th>";
	    echo "</tr>";
	    
	    
	while ($row = mysqli_fetch_array($result))
	    {
	        echo "<tr>";
	        
	        //cellen
	    echo "<td>" . $row['tijd'] . "</td>";
	    echo "<td><a href='inschrijven.php?id=" . $row['id'] ."'>Inschrijven</a></td>";
	    echo '<td><img style="width: 50px; height: auto;" src="uploads/' . $row['id'] . '.jpg">';
	    
	        echo "</tr>";
	}
	        echo "</table>";

	     
	    
	    ?>
		<!-- log out -->
        
        
        
        <!-- <a style="float: right;" href="logout.php">Logout</a> -->

</body>
</html>