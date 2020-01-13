      <?php
  include('session.php');
  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
      $mycname = mysqli_real_escape_string($db,$_POST['customername']);
      $myaddress = mysqli_real_escape_string($db,$_POST['customeraddress']); 
      $mymobile = mysqli_real_escape_string($db,$_POST['customermobile']);
      $myemail = mysqli_real_escape_string($db,$_POST['customeremail']);
      $mygst = mysqli_real_escape_string($db,$_POST['customergst']);
      //$id = mysqli_real_escape_string($db,$_POST['id']);
      $sql = "INSERT INTO customer(name,address,mobile,email,gst) VALUES ('$mycname','$myaddress','$mymobile','$myemail','$mygst') ";
echo $sql;
     // $result = mysqli_query($db,$sql);
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
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
  <a href="viewbill.php">Bill</a>
  <a href="viewitem.php">Item</a>
  <a href="viewcustomer.php">Customer</a>
  <a href="logout.php">Logout</a>
</div>
<div class="main">
      <form action = "" method = "post">
                  
        Name   <input type="text" name="customername" ><br/>
        Adress <input type="text" name="customeraddress" ><br/>
        Mobile <input type="text" name="customermobile" ><br/>
        Email  <input type="text" name="customeremail" ><br/>
        GST    <input type="text" name="customergst" ><br/>

        <br/><input type = "submit" value = " submit "/><br />
      </form>
    </div>
        </body>
               
               
               </html>