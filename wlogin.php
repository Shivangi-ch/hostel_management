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
        <p><a href="login.php">Student's Login</a></p>
    </div>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="wlogin.php">

  	<div class="input-group">
  		<input type="text" name="username" placeholder="Warden's Username" >
  	</div>

  	<div class="input-group">
  		<input type="password" name="password" placeholder="Password">
	</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>
<?php 
if(isset($_POST['login_user']))
{
//declaration   
$db = mysqli_connect('localhost','root','','studentregister') or die("Couldn't Connect to database");
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if($username=="" || $password=="")
    {
        echo "<script>window.alert('Email and Password is Required')</script>";
    }
    else
    {

        $query = "SELECT * FROM warden WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if(mysqli_num_rows($results)>0)
        {
            session_start();
            $_SESSION['username'] = $username;
            header("location: wardenindex.php");
        }
        else{
            echo "<script>window.alert('Email and Password is Incorrect')</script>";
        }
    }
}
?>