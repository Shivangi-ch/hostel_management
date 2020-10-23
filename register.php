
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
</head>
<body>
    <div class="bar">
        <img src="https://www.akgec.ac.in/wp-content/themes/twentysixteen/img/AKGEC_1_0.png" alt="logo">
        <h1>AKGEC,Hostel Management System</h1>
        
    </div>
  <div class="header">
  	<h2>REGISTER HERE</h2>
  </div>
  <form method="post" action="register.php">
      <?php include('errors.php'); ?>
      <div class="input-group">
        <input type="text" name="NAME"  placeholder="Students Name">
      </div>

      <div class="input-group">
        <input type="text" name="ROLLNO" placeholder="Students Rollno">
      </div>

  	  <div class="input-group">
        <input type="email" name="EMAIL" placeholder="Students Email">
      </div>
      <div class="input-group">
        <input type="text" name="CONTACT" placeholder="students phone">
      </div>
      <div class="input-group">
        <input type="text" name="ADDRESS" placeholder="students address">
      </div> 
      <div class="input-group">
        <input type="text" name="PARENTCONTACT" placeholder="paretns phone">
      </div>
      <div class="input-group">
      <input  list="branch" name="BRANCH" placeholder="students branch">
      <datalist id="branch">
    <option value="CSE">
    <option value="CS">
    <option value="CSIT">
    <option value="IT">
    <option value="ECE">
    <option value="ME">
    <option value="CIVIL">
  </datalist>
        
      </div>
      
      <div class="input-group">
        <input type="password" name="password_1" placeholder="Password">
      </div>

      <div class="input-group">
        <input type="password" name="password_2" placeholder="Confirm Password">
      </div>

      <div class="input-group">
        <button type="submit" class="btn" name="student_user">Register</button>
      </div>

      <p>
        Already a member? <a href="login.php">Sign in</a>
      </p>
  </form>
</body>
</html>