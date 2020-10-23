<?php
$db = mysqli_connect('localhost', 'root',''  ,'studentregister');
$query= "UPDATE complaints set status ='$_POST[fixed]' WHERE ROLLNUM= '$_POST[rollnum]'";
$b=$_GET['n'];
$query= "DELETE FROM complaints  WHERE ID= '$b'";
$query_run= mysqli_query($db,$query);
?>
<script type="text/javascript">
 alert("Complaint Resolved");
 window.location.href="wardenindex.php";
</script> 