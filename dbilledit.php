<?php
include('session.php');
$myid = $_GET['id'];
    //echo $myid;
     $sql = "SELECT id,billno,item,hsn,price,quantity,unit,amount FROM billdetails WHERE id=$myid";
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
        echo "<a href='updatebill.php?'>add</a>";
        //echo "<a href='deletebill.php?'>Delete</a>";
        echo "</td>";
echo "</tr>";
    }

} else {
    echo "0 results";
}
echo "</table>";
?> 