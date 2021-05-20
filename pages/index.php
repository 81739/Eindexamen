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
<a style="float: right;" href="registreren.php">Registreren</a>


	
    <h1>De Klapschaats</h1>
<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
			  unset($_SESSION['success']);
			  echo $_SESSION['message'];
          ?>
      	</h3>
      </div>
	  <?php endif ?>
	<form action="/action_page.php">
  <label for="datum">Kies datum:</label>
  <input type="date" id="datum" name="datum">
  <input type="submit">
</form>

<!-- logged in user information -->
<?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</body>
</html>