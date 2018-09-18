<?php
// start the session
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page </title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<ul class="nav">
  <li><a href="index.php">Home page </a></li>
  <li><a href="exercise.html">exercise one </a></li>
  <li><a href="numguess.html">number guessing game </a></li>
  <li><a href="msgbd.php">message board</a></li>
  <li><a href="index.php?logout='1'"  >logout</a></li>

</ul>
<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>


    <?php  if (isset($_SESSION['username'])) : ?>
      <h3>Here is your information</h3>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>

    <?php if (isset($_SESSION['email'])): ?>
      <p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
    <?php endif ?>
</div>

</body>
</html>
