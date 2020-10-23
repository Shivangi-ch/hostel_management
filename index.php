
<?php 
  session_start(); 

  if (!isset($_SESSION['ROLLNO'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['ROLLNO']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="style.css"> 
  <style>
  body{
    overflow:hidden;
  }
    .header,.content,form{
      all:unset;
    }
    .content p{
        font-family: 'Kufam', cursive;
        color:#ecf4f3;
      font-size:50px;
    }
    td{
        font-family: 'Kufam', cursive;
        color:#ecf4f3;
        font-size:140%;
    }
    .selection{
      margin: 100px;
      padding:0 auto 0;
    }
    .input-group{
      display:inline;
      padding: 0 60px 0;
    }
  </style>
</head>
<body>

<div class="bar">
        <img src="https://www.akgec.ac.in/wp-content/themes/twentysixteen/img/AKGEC_1_0.png" alt="logo">
        <h1>AKGEC,Hostel Management System</h1>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
  </div>
<!--<div class="header">
	<h2>Home Page</h2>
</div> -->
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

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['ROLLNO'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['ROLLNO']; ?></strong></p>
    <?php endif ?>
    <?php
      $host = 'localhost';
      $dbname = 'studentregister';
      $uname = 'root';
      $pssd = '';
      $un = $_SESSION['ROLLNO'];
      try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pssd);

          $sql = "SELECT * FROM users WHERE ROLLNO = '$un'";

          $q = $pdo->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          die("Could not connect to the database $dbname :" . $e->getMessage());
      }
      ?>

      <?php while ($row = $q->fetch()): ?>
          <center>
           <table>
             <tr>
                <td>Students's Name  :&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo htmlspecialchars($row['NAME']) ?></td>
              </tr>  
               <tr>
                 <td>Roll No.  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['ROLLNO']); ?></td>
               </tr> 
               <tr>
                 <td>Email  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['EMAIL']); ?></td>
               </tr> 
               <tr>
                 <td>Contact  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['CONTACT']); ?></td>
               </tr> 
               <tr>
                 <td>Address  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['ADDRESS']); ?></td>
               </tr>
               <tr>
                 <td>Parent Contact  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['PARENTCONTACT']); ?></td>
               </tr>
               <tr>
                 <td>Branch  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['BRANCH']); ?></td>
               </tr>
               <tr>
                 <td>Room No.  :&nbsp;&nbsp;&nbsp;</td>
                 <td><?php echo htmlspecialchars($row['ROOMNO']); ?></td>
               </tr>
          </table>
          </center>
      <?php endwhile; ?>     
    </div>
    <div class="selection">
    <div class="input-group">
        <?php

        if (isset($_POST['Change/Select Room']))

        {

          myfnc();

        }

        function myfnc()

        {

            echo "" ;

        }

        ?>
        <form action="apply.php" method="post">
        <!--<input type="submit" name="room_button" value="Change/Select Room">-->
        <button class="btn-lg btn-info" type="submit" name="room_button">Change/Select Room</button>
        </form>
    </div>
    <div class="input-group">
    <?php

if (isset($_POST['File a Complaint']))

{

  myfncs();

}

function myfncs()

{

    echo "" ;

}

?>

<form action="complaint.php" method="post">
<!--<input type="submit" name="complaint_button" value="File a Complaint">-->
<button class="btn-lg btn-info" type="submit" name="complaint_button">File a Complaint</button>
</form>
    </div>
    <div class="input-group">
    <?php

if (isset($_POST['Vacant room']))

{

  myfncm();

}

function myfncm()

{

    echo "" ;

}

?>
<form action="vacant.php" method="post">
<!--<input type="submit" name="vacant_button" value="Vacant your room">-->
<button class="btn-lg btn-info" type="submit" name="vacant_button">Vacant your room</button>
</form>
    </div>
    </div>    
  </body>
</html> 