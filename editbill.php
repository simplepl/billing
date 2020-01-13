<?php
include('session.php');
$myid = $_GET['id'];
    //echo $myid;
    $sql = "SELECT billno,date,workorder,customername,mobile,gst,address,email FROM billmaster WHERE id=$myid";
    //echo $sql;
$result = $db->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["passcode"]."";
        $mybillno =$row["billno"];
        $mydate= $row["date"];
        $myworkorder=$row["workorder"];
        $mycustomername= $row["customername"];
        $mymobile=$row["mobile"];
        $mygst=$row["gst"];
        $myaddress=$row["address"];
        $myemail= $row["email"];
        


      
    }
} 
?>
<html>
       
      <?php
 // include('config.php');
 //  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
      $mybillno = mysqli_real_escape_string($db,$_POST['billno']);
      $mydate = mysqli_real_escape_string($db,$_POST['date']); 
      $myworkorder = mysqli_real_escape_string($db,$_POST['workorder']);
      $mycustomername = mysqli_real_escape_string($db,$_POST['customername']);
      $mymobile = mysqli_real_escape_string($db,$_POST['mobile']);
      $mygst = mysqli_real_escape_string($db,$_POST['gst']);
      $myaddress = mysqli_real_escape_string($db,$_POST['address']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);

      $sqlupdate = "UPDATE billmaster SET billno='$mybillno' , date = '$mydate' ,workorder='$myworkorder' ,customername = '$mycustomername',mobile='$mymobile',gst='$mygst',address = '$myaddress',email='$myemail' WHERE id='$myid' ";
  //echo $sqlupdate;
if ($db->query($sqlupdate) === TRUE) {
    //echo "Record updated successfully";
    //header("location: viewbill.php");
} else {
    echo "Error updating record: " . $db->error;
}

     
   }
?>
      <form action = "" method = "post">
        Bill no   <input type="text" name="billno" ><br/>
        Date <input type="Date" name="date" ><br/>
        Work order <input type="text" name="workorder" ><br/>
        Customer name  <input type="text" name="customername" ><br/>
        Mobile    <input type="text" name="mobile" ><br/>
        Gst <input type="text" name="gst" ><br/>
        address  <input type="text" name="address" ><br/>
        email    <input type="text" name="email" ><br/>
        
        <input type = "submit" value = " update "/><br />
               </form>
               </html>