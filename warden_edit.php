<?php
$db = mysqli_connect('localhost', 'root',''  ,'studentregister');
$query= "UPDATE users set NAME ='$_POST[sname]', CONTACT='$_POST[contact]' , PARENTCONTACT='$_POST[pcontact]',
ADDRESS='$_POST[address]' WHERE ROLLNO= '$_POST[rollno]'";
$query_run= mysqli_query($db,$query);
?>
<script type="text/javascript">
 alert("Details Edited Successfully");
 window.location.href="wardenindex.php";
</script>