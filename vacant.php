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
	<title>Vacant</title>
	 <link rel="stylesheet" type="text/css" href="vacant.css"> 
</head>
<body>

<div class="letters">
	<h2>| Vacant your room |</h2>
</div>


    

      <form method="post" action="vacant.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
          <input type="text" name="NAMESTUDENT"  placeholder="Students Name">
        </div>

        <div class="input-group">
          <input type="text" name="ROLLNUMBER" placeholder="Students Rollno">
        </div>

        <div class="input-group">
          <input type="text" name="ROOMNUMBER" placeholder="students Room number">
        </div>
         <div class="input-group">
        <input type="date"  name="DTE">
</div>
        

        <div class="inp">
          <textarea name="REASON"  placeholder="Reason you are leaving" rows="8" cols="60"></textarea>
        </div>
        

       


         <div class="input-group">
          <button type="submit" class="btn" name="vacant_room">Submit</button>
        </div> 

      </form> 
    </div>  
  </body>
</html>




