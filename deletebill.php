<?php
include('session.php');
   session_start();
   $myid = $_GET['id'];
   
   
$sql = "DELETE FROM billdetails WHERE id=$myid";
 echo "$sql";
if(mysqli_query($db, $sql)){ 
    echo "Record was deleted successfully."; 
}  
      header("Location: viewbill.php");
?>

