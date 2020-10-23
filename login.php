<?php include('server.php') ?>
<!DOCTYPE html>
<html>  
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>

</head>
<body>
<div class="bar">
        <img src="https://www.akgec.ac.in/wp-content/themes/twentysixteen/img/AKGEC_1_0.png" alt="logo">
        <h1>AKGEC,Hostel Management System</h1>
        
		<p><a href="wlogin.php">Warden's Login</a></p>
    </div>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  		<input type="text" name="ROLLNO" placeholder="Students Rollno" >
  	</div>

  	<div class="input-group">
  		<input type="password" name="password_1" placeholder="Password">
	</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>

  	<p>
    Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>