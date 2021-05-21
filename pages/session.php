<?php
if (!isset($_SESSION['level']))
{
    $_SESSION['message'] = "U moet ingelogd zijn om deze pagina te bekijken";
    header('location: login.php');
}
?>
