 <html>
 <head>
  <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>

   
  <body>
    <div class="sidenav">
  <a href="welcome.php">Dashboard</a>
  <a href="billmaster.php">Bill</a>
  <a href="viewitem.php">Item</a>
  <a href="viewcustomer.php">Customer</a>
  <a href="logout.php">Logout</a>
</div>
</body>
<div class="main">
<?php
include('session.php');
$myid = $_GET['id'];
    //echo $myid;
    $sql = "SELECT itemname,hsn,price,tax,unit,stock FROM item next WHERE id=$myid";
$result = $db->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["passcode"]."";
        $myitemname=$row["itemname"];
        $myhsn= $row["hsn"];
        $myprice=$row["price"];
        $mytax= $row["tax"];
        $myunit=$row["unit"];
        $mystock=$row["stock"];

      
    }
} 
?>
<html>
       
      <?php
 //  include('config.php');
 //  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
       $myitemname = mysqli_real_escape_string($db,$_POST['itemname']);
      $myhsn = mysqli_real_escape_string($db,$_POST['hsn']); 
      $myprice = mysqli_real_escape_string($db,$_POST['price']);
      $mytax = mysqli_real_escape_string($db,$_POST['tax']);
      $myunit = mysqli_real_escape_string($db,$_POST['unit']);
      $mystock = mysqli_real_escape_string($db,$_POST['stock']);
      
      $sqlupdate = "UPDATE item SET itemname='$myitemname' , hsn = '$myhsn' ,price='$myprice' , tax = '$mytax',unit='$myunit' , stock = '$mystock' WHERE id='$myid' ";
////echo $sql;
if ($db->query($sqlupdate) === TRUE) {
    //echo "Record updated successfully";
     header("location: viewitem.php");
} else {
    echo "Error updating record: " . $db->error;
}

     
   }
?>
       <html>
  <body>
      <form action = "" method = "post">
                  
        item name<input type="text" name="itemname" value="<?php echo $myitemname ?>"></br>
        hsn<input type="text" name="hsn" value="<?php echo $myhsn ?>"><br/>
        price<input type="text" name="price" value="<?php echo $myprice ?>"><br/>
        tax<input type="text" name="tax" value="<?php echo $mytax ?>"><br/>
        unit<input type="text" name="unit" value="<?php echo $myunit ?>"><br/>
        stock<input type="text" name="stock" value="<?php echo $mystock ?>"><br/>
      
       <input type = "submit" value = " submit "/><br />
        </body>
               </form>
               </html>