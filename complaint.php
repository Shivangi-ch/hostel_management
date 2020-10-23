<?php include('server.php') ?>
<?php 
  //session_start(); 

  if (!isset($_SESSION['ROLLNO'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint</title>
  <link rel="stylesheet" type="text/css" href="complaint.css">
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
</head>
<body>
    <span class="letters">| File  a  Complaint |</span>

      <form method="post" action="complaint.php">
        <?php include('errors.php'); ?>
       
        <div class="input-group">
          <input type="text" name="STUDENT_NAME"  placeholder="Students Name">
        </div>

        <div class="input-group">
          <input type="text" name="ROLLNUM" placeholder="Students Rollno">
        </div>

        <div class ="input-group">
          <input type="text" name="ROOMNM" placeholder="Students Room mumber">
        </div>

        <div class="input-group">
          <input type="text" name="PHONE" placeholder="Students phone">
        </div> 

        <div class="input-group">
          <input type="date" placeholder="date" name="DATE">
        </div>

        <div class="inp">
          <textarea name="COMPLAINT"  placeholder="write your issues" rows="8" cols="60"></textarea>
        </div>
 
        <div class="input-group">
          <button type="submit" class="btn" name="complaint_file">Send to Warden</button>
        </div>

      </form> 
  </body>
</html>




