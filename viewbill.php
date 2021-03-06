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

<?php
include('session.php');
 $sql = "SELECT billno,item,hsn,price,quantity,unit,amount FROM billdetails";
 $result = $db->query($sql);
echo "<table><tr><th>Bill no</th><th>Item</th><th>hsn</th><th>price</th><th>quantity</th><th>unit</th><th>Amount</th></tr>";
 if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row["billno"]; 
        echo "</td>";
        echo "<td>";
        echo $row["item"];
        echo "</td>";
        echo "<td>";
        echo $row["hsn"];
        echo "</td>";
        echo "<td>";
        echo $row["price"]; 
        echo "</td>";
        echo "<td>";
        echo $row["quantity"];
        echo "</td>" ;
        echo "<td>";
        echo $row["unit"];
        echo "</td>";
        echo "<td>";
        echo $row["amount"];
        echo "</td>" ;
        echo "<td>";
        echo "<a href='updatebill.php?id=$row[id]'>Update</a>";
        echo "<a href='deletebill.php?id=$row[id]'>Delete</a>";

        echo "</td>";
echo "</tr>";
    }

} else {
   // echo "0 results";
}
echo "</table>";
?> 

    
</body>
       </html>
