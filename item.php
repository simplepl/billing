
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
  include('config.php');
  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
      $myitemname = mysqli_real_escape_string($db,$_POST['itemname']);
      $myhsn = mysqli_real_escape_string($db,$_POST['hsn']); 
      $myprice = mysqli_real_escape_string($db,$_POST['price']);
      $mytax = mysqli_real_escape_string($db,$_POST['tax']);
      $myunit = mysqli_real_escape_string($db,$_POST['unit']);
      $mystock = mysqli_real_escape_string($db,$_POST['stock']);
      //$id = mysqli_real_escape_string($db,$_POST['id']);
      $sql = "INSERT INTO item(id,itemname,hsn,price,tax,unit,stock) VALUES ('$id','$myitemname','$myhsn','$myprice','$mytax','$myunit','$mystock')";
echo $sql;
     // $result = mysqli_query($db,$sql);
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
  header("location: viewitem.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

//$conn->close();
 
    //echo "Record updated successfully";
    // header("location: welcome.php");
 //else {
    //echo "Error updating record: " . $db->error;
//}

     
   }
?>
 <html>
  <body>
      <form action = "" method = "post">
                  
        Item name<input type="text" name="itemname"><br/>
        Hsn/Sac<input type="text" name="hsn"><br/>
        Price<input type="text" name="price"><br/>
        Tax<input type="text" name="tax"><br/>
        Unit<input type="text" name="unit"><br/>
        Stock<input type="text" name="stock"><br/>

        <input type = "submit" value = " submit "/><br />
        </body>
               </form>
               </html>