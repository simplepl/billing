<?php
include('session.php');
$myid = $_GET['id'];
    //echo $myid;
    $sql = "SELECT name, address, mobile, email, gst FROM customer WHERE id=$myid";
    //echo $sql;
$result = $db->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["passcode"]."";
        $mycname =$row["name"];
        $myaddress= $row["address"];
        $mymobile=$row["mobile"];
        $myemail= $row["email"];
        $mygst=$row["gst"];

      
    }
} 
?>
<html>
       
      <?php
 //  include('config.php');
 //  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
      $mycname = mysqli_real_escape_string($db,$_POST['name']);
      $myaddress = mysqli_real_escape_string($db,$_POST['address']); 
      $mymobile = mysqli_real_escape_string($db,$_POST['mobile']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mygst = mysqli_real_escape_string($db,$_POST['gst']);

      $sqlupdate = "UPDATE customer SET name='$mycname' , address = '$myaddress' ,mobile='$mymobile' , email = '$myemail',gst='$mygst' WHERE id='$myid' ";
  //echo $sqlupdate;
if ($db->query($sqlupdate) === TRUE) {
    //echo "Record updated successfully";
    header("location: viewcustomer.php");
} else {
    echo "Error updating record: " . $db->error;
}

     
   }
?>
      <form action = "" method = "post">
        Name<input type="text" name="name" value="<?php echo $mycname;?>"></br>
        Address<input type="text" name="address" value="<?php echo $myaddress; ?>"><br/>
        Mobile<input type="text" name="mobile" value="<?php echo $mymobile; ?>"><br/>
        Email<input type="text" name="email" value="<?php echo $myemail; ?>"><br/>
        Gst<input type="text" name="gst" value="<?php echo $mygst; ?>"><br/>
      
        <input type = "submit" value = " update "/><br />
               </form>
               </html>