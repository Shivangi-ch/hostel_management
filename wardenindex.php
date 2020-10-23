
<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
     $_SESSION['msg']='You Must login first to view this page';
     header("location: wlogin.php");
 }
 $db = mysqli_connect('localhost', 'root',''  ,'studentregister');
?>
<!DOCTYPE html>
<html>  
<head>
  <title>Warden's Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
  <style>
  *{
      font-family: 'Raleway', sans-serif;
      }
    form
    {
        all:unset;
    }
    .txx{
        padding-top:20px;
    }
    a{
      color:#31112c;
    }
    /*span{
      color:white;
      transition:all 0.4s ease;
    }
    .fd{
      color:blue;
    }*/
    button{
        margin: 10px 50px 0;
    }
    #details{
        margin:30px auto 0; 
        width:90%;
        height:300px;
        /*background-color: rgba(22, 22, 22, 0.39);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border: 1px solid black;*/
    }
    .search{
        padding:40px 10px 0;
    }
    b,.txx,.complaint,.all_stu{
        /*font-family: 'Kufam', cursive;*/
        color:#ecf4f3;
    }
    .hide{
      display:none;
    }
    #one{
      margin-top:20px;
    }
    strong{
      color:#99f3bd;
    }
    .search tr{
        margin:3px 0 3px;
    }
    img{
      position:absolute;
      top:30px;
      left:20px;
      border-radius:20%;
      width:320px;
      height:320px;
    }
    .in{
      position:absolute;
      text-align:left;
      font-size:22px;
      top:30px;
      right:10px;
      width:70%;
    }
    input{
        text-align:center;
        font-weight:900;
        color:#006a71;
        background-color:none;
    }
    /*.tb>th,td{
      background:rgba(0,0,0,0.5)	;color:#f6f6f6;
    }*/
  </style>

</head>
<body>
<div class="bar">
        <img src="https://www.akgec.ac.in/wp-content/themes/twentysixteen/img/AKGEC_1_0.png" alt="logo">
        <h1>AKGEC,Hostel Management System</h1>
        <p> <a href="logout.php">Logout</a></p>
    </div>
    <h1 class="txx">Welcome, <?php echo $_SESSION['username'];?></h1>

   <!--buttons for selection-->
    <div id="select">
      <form action="" method="post">
        <button class="btn-lg btn-info" type="submit" name="search_student">Search Student</button>
        <button class="btn-lg btn-info" type="submit" name="edit_student">Edit Details</button>
        <button class="btn-lg btn-info" type="submit" name="complaints">Complaints</button>
        <button class="btn-lg btn-info" type="submit" name="see_details">See Details</button>
        <button class="btn-lg btn-info" type="submit" name="vacant_details">Just Vacant Rooms</button>
      </form>
    </div>
    <!-- intoductory div-->
    <div id="one" style="position:relative;">
       <img src="hostelbg2.jpg" alt="">
        <div class="in tx"><p><strong>Ajay Kumar Garg Engineering College (AKGEC)</strong>, Ghaziabad is affiliated to<strong> Dr. A.P.J. Abdul Kalam Technical University, Lucknow</strong>,
         and is approved by the All India Council for Technical Education. 
        The college was established in 1998 and offers BTech courses in seven disciplines of Engineering 
        namely Computer Science and Engineering, Information Technology, Electronics and Communication Engineering, Electronics and Instrumentation Engineering, 
        Electrical and Electronics Engineering, Mechanical Engineering and Civil Engineering. The college also offers MTech in Automation and Robotics, 
        Electronics & Communication Engineering, Computer Science, Electrical and Electronics Engineering and Mechanical Engineering. The college is accredited by NAAC.
        </p>
         <!--<script src="ani.js"></script>-->
        </div>
    </div> 
    <!-- details will be displayed here-->
    <div id="details" class="hide">
        <!--searching for student individualy-->
       <div class="search">
       <?php
         if(isset($_POST['search_student']))
         {
             ?>
             <script>
             document.getElementById("one").classList.add('hide');
             document.getElementById("details").classList.remove('hide');
             </script>
            <center>
            <form style="color:#ecf4f3;" action="" method="post">
                <b>Enter Roll No. to search&nbsp;&nbsp;&nbsp;</b>
                <input type="text" name="roll_no">
                <button class="btn-sm btn-dark" type="submit" name="search_by_roll">Submit</button>
            </form>
            </center>
            <!-- display of details-->
            <?php
         }
         if(isset($_POST['search_by_roll']))
         {

             $query= "SELECT * FROM users WHERE ROLLNO= '$_POST[roll_no]'";
             $results = mysqli_query($db, $query);
             if(mysqli_num_rows($results)==0)
             {
                echo "<script>window.alert('Student Not in database')</script>";
             }
             else{
             $query_run= mysqli_query($db,$query);
             while($row = mysqli_fetch_assoc($query_run))
             {
                 ?>
                 <script>
                 document.getElementById("one").classList.add('hide');
                 document.getElementById("details").classList.remove('hide');
                 </script>
                 <center>
                 <table>
                  <tr>
                      <td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['NAME'];?>"disabled>
                       </td>
                   </tr>
                   <tr>    
                      <td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['ROLLNO'];?>"disabled>
                       </td>
                    </tr>
                    <tr>
                      <td><b>Email:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['EMAIL'];?>"disabled>
                       </td>
                    </tr>
                     <tr>
                      <td><b>Contact No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['CONTACT'];?>"disabled>
                       </td>
                     </tr>
                     <tr>
                      <td><b>Parent's Contact:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['PARENTCONTACT'];?>"disabled>
                       </td>
                     </tr>
                     <tr>
                      <td><b>Home Address:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['ADDRESS'];?>"disabled>
                       </td>
                    </tr>
                    <tr>
                    <td><b>Branch:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['BRANCH'];?>"disabled>
                       </td>
                    </tr>
                    <tr>
                      <td><b>Room No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['ROOMNO'];?>"disabled>
                       </td>
                  </tr>
                 </table>
                 </center>
                 <?php
             }
             }
         }
         ?>
         </div>
         <!-- section for editing details-->
         <div class="edit">
       <?php
         if(isset($_POST['edit_student']))
         {
             ?>
             <script>
             document.getElementById("one").classList.add('hide');
             document.getElementById("details").classList.remove('hide');
             </script>
            <center>
            <form style="color:#ecf4f3;" action="" method="post">
               <b>Enter Roll No. to edit&nbsp;&nbsp;&nbsp;</b>
                <input type="text" name="roll_no">
                <button class="btn-sm btn-dark" type="submit" name="edit_by_roll">Submit</button>
            </form>
            </center>
            <!-- display for editable details-->
            <?php
         }
         if(isset($_POST['edit_by_roll']))
         {
             $query= "SELECT * FROM users WHERE ROLLNO= '$_POST[roll_no]'";
             $results = mysqli_query($db, $query);
             if(mysqli_num_rows($results)==0)
             {
                echo "<script>window.alert('Student Not in database')</script>";
             }
             else{
             $query_run= mysqli_query($db,$query);
             while($row = mysqli_fetch_assoc($query_run))
             {
                 ?>
                 <script>
                 document.getElementById("one").classList.add('hide');
                 document.getElementById("details").classList.remove('hide');
                 </script>
                 <center>
                 <form action="warden_edit.php" method="post">
                 <table>
                  <tr>
                      <td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" name="sname" value="<?php echo $row['NAME'];?>">
                       </td>
                   </tr>
                   <tr>    
                      <td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text"  value="<?php echo $row['ROLLNO'];?>" disabled>
                        <input style="display:none;"  type="text" name="rollno" value="<?php echo $row['ROLLNO'];?>">
                       </td>
                    </tr>
                    <tr>
                      <td><b>Email:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['EMAIL'];?>"disabled>
                       </td>
                    </tr>
                     <tr>
                      <td><b>Contact No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text"  name="contact" value="<?php echo $row['CONTACT'];?>">
                       </td>
                     </tr>
                     <tr>
                      <td><b>Parent's Contact:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text"  name="pcontact" value="<?php echo $row['PARENTCONTACT'];?>">
                       </td>
                     </tr>
                     <tr>
                      <td><b>Home Address:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text"  name="address" value="<?php echo $row['ADDRESS'];?>">
                       </td>
                    </tr>
                    <tr>
                    <td><b>Branch:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['BRANCH'];?>"disabled>
                       </td>
                    </tr>
                    <tr>
                      <td><b>Room No:&nbsp;&nbsp;&nbsp;</b></td>
                       <td>
                        <input type="text" value="<?php echo $row['ROOMNO'];?>"disabled>
                       </td>
                  </tr>
                  <tr>
                   <td></td>
                   <td><button class="btn-sm btn-dark" type="submit" name="submit_details">Save</button></td>
                  </tr>
                 </table>
                 </form>
                 </center>
                 <?php
             }
             }
         }
         ?>
         </div>
         <!-- complaints section-->
        <div class="complaint">
         <?php
         if(isset($_POST['complaints']))
         {
          $query= "SELECT * FROM complaints";
          $query_run= mysqli_query($db,$query);
           {
             ?>
             <script>
             document.getElementById("one").classList.add('hide');
                 document.getElementById("details").classList.remove('hide');
             </script>
             <center>
             <table class="table tb table-bordered" align="center" style="text-align:center;background:rgba(0,0,0,0.5)	;color:#f6f6f6;">
               <t>
                <th>S.No.</th>
                <th>Complaint</th>
                <th>Student's Name</th>
                <th> Roll no.</th>
                <th>Date</th>
                <th>Room No.</th>
                <th>Update status</th>
                <!--<th style="padding: 10px 10px 10px 10px ;">   </th>-->
               </t>
               <?php
                 while($rows = mysqli_fetch_assoc($query_run))
                 {
                  ?>
                  <tr>
                   <td><?php echo $rows['ID']?></td>
                   <td><?php echo $rows['COMPLAINT']?></td>
                   <td><?php echo $rows['STUDENT_NAME']?></td>
                   <td><?php echo $rows['ROLLNUM']?></td>
                   <td><?php echo $rows['DATE']?></td>
                   <td><?php echo $rows['ROOMNM']?></td>
                   <td><a style="color:#fff;" href="complaint_submit.php?n=<?php echo $rows['ID']?>">Solved</a></td>
                  </tr>
                  <?php
                 }
                 ?>
             </table>
             </center>
             <?php
           }
         }
         ?>
        </div>
        <!-- all students's details-->
        <div class="all_stu">
        <?php
        if(isset($_POST['see_details']))
        {
          $query= "SELECT * FROM users ";
          $query_run= mysqli_query($db,$query);
          {
              ?>
              <script>
              document.getElementById("one").classList.add('hide');
              document.getElementById("details").classList.remove('hide');
              </script>
              <center>
              <table class="table tb table-bordered" align="center"  style="text-align:center;background:rgba(0,0,0,0.5)	;color:#f6f6f6;">
               <t>
                <th >Student's Name</th>
                <th>Roll no.</th>
                <th>Branch</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Parent's Contact</th>
                <th>Address</th>
                <th>Room No.</th>
               </t>
               <?php
                 while($rows = mysqli_fetch_assoc($query_run))
                 {
                  ?>
                  <tr>
                   <td><?php echo $rows['NAME']?></td>
                   <td><?php echo $rows['ROLLNO']?></td>
                   <td><?php echo $rows['BRANCH']?></td>
                   <td><?php echo $rows['EMAIL']?></td>
                   <td><?php echo $rows['CONTACT']?></td>
                   <td><?php echo $rows['PARENTCONTACT']?></td>
                   <td><?php echo $rows['ADDRESS']?></td>
                   <td><?php echo $rows['ROOMNO']?></td>
                   </tr>
                   <?php
                   }
                   ?>
              </table>
              </center>
              <?php
              }
        }
        ?>
        </div>
        <!-- vacant room details-->
        <div class="complaint">
         <?php
         if(isset($_POST['vacant_details']))
         {
          $query= "SELECT * FROM vacant";
          $query_run= mysqli_query($db,$query);
           {
             ?>
             <script>
                 document.getElementById("one").classList.add('hide');
                 document.getElementById("details").classList.remove('hide');
             </script>
             <center>
             <table class="table tb table-bordered" align="center" style="text-align:center;background:rgba(0,0,0,0.5)	;color:#f6f6f6;">
               <t>
                <th>S.No.</th>
                <th>Room Number</th>
                <th>Student's Name</th>
                <th> Roll no.</th>
                <th>Date</th>
                <th>Reason</th>
                <th>Update status</th>
                <!--<th style="padding: 10px 10px 10px 10px ;">   </th>-->
               </t>
               <?php
                 while($rows = mysqli_fetch_assoc($query_run))
                 {
                  ?>
                  <tr>
                   <td><?php echo $rows['SN']?></td>
                   <td><?php echo $rows['ROOMNUMBER']?></td>
                   <td><?php echo $rows['NAMESTUDENT']?></td>
                   <td><?php echo $rows['ROLLNUMBER']?></td>
                   <td><?php echo $rows['DTE']?></td>
                   <td><?php echo $rows['REASON']?></td>
                   <td><a style="color:#fff;" href="vacant_room.php?n=<?php echo $rows['SN']?>">Update</a></td>
                  </tr>
                  <?php
                 }
                 ?>
             </table>
             </center>
             <?php
           }
         }
         ?>
        </div>
    </div>
</body>
</html>