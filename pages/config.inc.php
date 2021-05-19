<?php
// database logingegevens
$db_hostname = 'localhost'; //of '127.0.0.1'
$db_username = '81739_eindexamen';
$db_password = 'Q8d&fp05';
$db_database = 'eindexamen';

// maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

//Als de verbinding niet gemaakt kan worden: geef een melding
if (!$mysqli) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "ERROR: " . mysqli_connect_error() . "<br/>";
    echo "ERROR: " . mysqli_connect_error() . "<br/>";
    exit;
}
