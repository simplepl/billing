<?php
include('session.php');
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
  <a href="billmaster.php">Bill</a>
  <a href="viewitem.php">Item</a>
  <a href="viewcustomer.php">Customer</a>
  <a href="logout.php">Logout</a>
</div>
<div class="main">
	<a href='customer.php'>Add</a>

 <?php
$sql = "SELECT id,name, address, mobile, email,gst FROM customer";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><th>Name</th><th>Address</th><th>Mobile</th><th>Email</th><th>GST</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>" ;
        echo "<td>";
        echo $row["name"]; 
        echo "</td>" ;
        echo "<td>";
        echo $row["address"] ;
        echo "</td>" ;
        echo "<td>";
        echo $row["mobile"];
        echo "</td>" ;
        echo "<td>";
        echo $row["email"]; 
        echo "</td>" ;
        echo "<td>";
        echo $row["gst"];
        echo "</td>";
        echo "<td>";
        echo "<a href='editcustomer.php?id=$row[id]'>Edit</a>";
        echo "<a href='delete.php?id=$row[id]'>Delete</a>";
        echo "</td>";
        echo "</tr>" ;

    }
    echo "</table>";
} else {
    echo "0 results";
}


//$conn->close();
?> 
    </div>

</body>
       </html>
               
               
            