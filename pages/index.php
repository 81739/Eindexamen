<!DOCTYPE html>
<html>
<head>
	    
    <!-- Site data
    ================================================== -->
    <meta charset="utf-8">
    <title>De Klapschaats</title>
    <meta name="author" content="De Klapschaats">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<h1 class="justify-centertext-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate m-8">De Klapschaats</h1>
<a class="m-2 float-right inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="login.php">Log in</a>



<a class="m-2 float-right inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="registreren.php">Registreren</a>





<!-- notificatie berichten -->
<?php if (isset($_SESSION['success'])): ?>
      <div class="error success" >
      	<h3>
          <?php
    // als er iets succesvol is gebeurd
    echo $_SESSION['success'];
    // weghalen voor andere succes berichten
    unset($_SESSION['success']);
    // Een mededeling
    echo $_SESSION['message'];
    // Een mededeling
    unset($_SESSION['message']);

?>
      	</h3>
      </div>
	  <?php
endif ?>
</body>
</html>
