<?php
 session_start();
$NAME = "";
$ROLLNO="";
$EMAIL    = "";
$CONTACT="";
$ADDRESS="";
$PARENTCONTACT="";
$BRANCH="";

$errors = array();
$db = mysqli_connect('localhost', 'root',''  ,'studentregister');

if (isset($_POST['student_user'])) {
  $NAME = mysqli_real_escape_string($db, $_POST['NAME']);
  $ROLLNO =mysqli_real_escape_string($db, $_POST['ROLLNO']);
  $EMAIL = mysqli_real_escape_string($db, $_POST['EMAIL']);
  $CONTACT = mysqli_real_escape_string($db, $_POST['CONTACT']);
  $ADDRESS = mysqli_real_escape_string($db, $_POST['ADDRESS']);
  $PARENTCONTACT = mysqli_real_escape_string($db, $_POST['PARENTCONTACT']);
  $BRANCH = mysqli_real_escape_string($db, $_POST['BRANCH']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  if (empty($NAME) ||  empty($ROLLNO) || empty($EMAIL)  || empty($password_1)) { 
   array_push($errors, "Please fill all the fields"); 
  }
  
 

  //Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password_1);
  $lowercase = preg_match('@[a-z]@', $password_1);
  $number    = preg_match('@[0-9]@', $password_1);
  $specialChars = preg_match('@[^\w]@', $password_1);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8) {
      //echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      array_push($errors, "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."); 
  }
  else{
      echo 'Strong password.';
  }
 
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if ( !preg_match ("/^[a-zA-Z\s]+$/",$NAME)) {
    array_push($errors, "Name must only contain letters and spaces!");
  } 
   if (!is_numeric($ROLLNO)) {
    array_push($errors, "Rollno. must include only numeric values");
   }

  $user_check_query = "SELECT * FROM users WHERE ROLLNO='$ROLLNO' OR EMAIL='$EMAIL' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['ROLLNO'] === $ROLLNO) {
      array_push($errors, "Roll number already exists");
    }
    if ($user['EMAIL'] === $EMAIL) {
      array_push($errors, "email already exists");
    }
  }
  $default_room = "Not Alloted";
  if (count($errors) == 0) {
  	$password = hash('sha256',$password_1);
  	$query = "INSERT INTO users (NAME, ROLLNO, EMAIL,CONTACT, ADDRESS, PARENTCONTACT, BRANCH, password_1, ROOMNO) 
  			  VALUES('$NAME', '$ROLLNO', '$EMAIL', '$CONTACT', '$ADDRESS', '$PARENTCONTACT', '$BRANCH', '$password', '$default_room')";
  	mysqli_query($db, $query);
  	// $_SESSION['USERNAME'] = $USERNAME;
  	// $_SESSION['success'] = "You are now registered";
  	header('location: login.php');
  }
}

if (isset($_POST['login_user'])) {
  $ROLLNO = mysqli_real_escape_string($db, $_POST['ROLLNO']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
 

  if (empty($ROLLNO)) {
  	array_push($errors, "Rollno is required");
  }
  if (empty($password_1)) {
  	array_push($errors, "Password is required");
  }

 
  if (count($errors) == 0) {
  	$password = hash('sha256',$password_1);
  	$query = "SELECT * FROM users WHERE ROLLNO ='$ROLLNO' AND password_1='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) >= 1) {
  	  $_SESSION['ROLLNO'] = $ROLLNO;
      $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
    }
    else {
  		array_push($errors, "Wrong Rollno/password combination");
  	}
  }
}

if (isset($_POST['room_application'])) {
  $req = mysqli_real_escape_string($db, $_POST['REQ']);
  $RL = mysqli_real_escape_string($db, $_POST['ROLLNO']);
  $RN = mysqli_real_escape_string($db, $_POST['ROOMNO']);
  $CR = mysqli_real_escape_string($db, $_POST['CURRENT']);
  if (empty($RN)) {
    array_push($errors, "Room no. is required");
  }
  if (count($errors) == 0) {
    if($req == 'C')
    {
      $query1 = "UPDATE rooms
        SET 
            ROLLNO = NULL
        WHERE
            ROOMNO = '$CR'";
      mysqli_query($db, $query1);
      $query3 = "UPDATE rooms
        SET 
            ROLLNO = '$RL'
        WHERE
            ROOMNO = '$RN'";
      mysqli_query($db, $query3);
    }
    
    else
    {
      $query1 = "UPDATE rooms
        SET 
            ROLLNO = '$RL'
        WHERE
            ROOMNO = '$RN'";
      mysqli_query($db, $query1);
    }
    $query2 = "UPDATE users
    SET 
        ROOMNO = '$RN'
    WHERE
        ROLLNO = '$RL'";
    mysqli_query($db, $query2);
    header('location: index.php');
  }
}
if (isset($_POST['complaint_file'])) {
  $NME = mysqli_real_escape_string($db, $_POST['STUDENT_NAME']);
  $ROOLNUM = mysqli_real_escape_string($db, $_POST['ROLLNUM']);
  $ROOMNm = mysqli_real_escape_string($db, $_POST['ROOMNM']);
  $COM= mysqli_real_escape_string($db, $_POST['COMPLAINT']);
  $PHN = mysqli_real_escape_string($db, $_POST['PHONE']);
  $DTE=mysqli_real_escape_string($db, $_POST['DATE']);
  
  $query = "INSERT INTO complaints (STUDENT_NAME, ROLLNUM, ROOMNM, COMPLAINT, PHONE, DATE) 
  VALUES('$NME', '$ROOLNUM','$ROOMNm', '$COM', '$PHN','$DTE')";
  mysqli_query($db, $query);
  header('location: index.php');
}
if (isset($_POST['vacant_room'])) {
  $name = mysqli_real_escape_string($db, $_POST['NAMESTUDENT']);
  $rollno = mysqli_real_escape_string($db, $_POST['ROLLNUMBER']);
  $roomno= mysqli_real_escape_string($db, $_POST['ROOMNUMBER']);
  $reason = mysqli_real_escape_string($db, $_POST['REASON']);
  $date=mysqli_real_escape_string($db, $_POST['DTE']);
  $m="Not alloted";
  $query = "INSERT INTO vacant (NAMESTUDENT, ROLLNUMBER, ROOMNUMBER, REASON, DTE) 
  VALUES('$name', '$rollno', '$roomno', '$reason','$date')";
  mysqli_query($db, $query);
  $query1 = "UPDATE rooms
  SET 
      ROLLNO = NULL
  WHERE
      ROOMNO = '$roomno'";
  mysqli_query($db, $query1);
  $query2 = "UPDATE users
  SET 
      ROOMNO = '$m'
  WHERE
      ROLLNO = '$rollno'";
  mysqli_query($db, $query2);
  header('location: index.php');
}





?> 