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
	<title>Room</title>
    <link rel="stylesheet" type="text/css" href="apply.css">
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
</head>
<body>

<div class="letters">
	<h2>| Select or Change Room |</h2>
</div>


   
    <?php
      $host = 'localhost';
      $dbname = 'studentregister';
      $uname = 'root';
      $pssd = '';
      $un = $_SESSION['ROLLNO'];
      $x = NULL;
      try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pssd);

          $sql = "SELECT * FROM rooms WHERE ROLLNO IS NULL";

          $q = $pdo->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          die("Could not connect to the database $dbname :" . $e->getMessage());
      }
      ?>  
      <!-- <p style="color:black; font-size: 20px; margin-left:-40px;">Available rooms:-</p> -->
      
      <form method="post" action="apply.php">
        <?php include('errors.php'); ?>
       
      
        
        <div class="input-group">
          <input type="hidden" name="ROLLNO" value="<?php echo $un ?>">
        </div> 
        <p  class="choose" >Select one option from below:-</p>
        <input  type="radio" name="REQ" id ="nr" value = "s"checked>
        <label for = "nr">
          <span style="color: white; font-size: 20px; margin-left:-40px;"> New Resident</span>
        </label>
    
      <input id="cr" value="C" type="radio" name="REQ">
      <label for="cr" class="radio-inline">
        <span style="color: white;font-size: 20px; margin-left:-40px;">Change my current room </span>
      </label>
   
        </div>
        <p>Current Room(Only for changing room)</p>
        <div class="input-group">
          <input type="text" name="CURRENT">
        </div>
        <p>Enter a room from the above list to choose.</p>
        <div class="input-group">
          <!-- <input  name="ROOMNO" > -->
          <select id="stl" type="list" name="ROOMNO">
          <?php 
          while ($row = $q->fetch()){
            echo "<option>".$row['ROOMNO']."</option>";
          }
          ?>
          </select> 
        </div>

        <div class="input-group">
          <button type="submit" class="btn" name="room_application">Send application to warden</button>
        </div>

      </form> 
    </div>  
  </body>
</html>
       




