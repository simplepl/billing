<?php
include('session.php');
// include('config.php');
  //session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 
      
      $mybillno = mysqli_real_escape_string($db,$_POST['txtbillno']);
      $_SESSION['sesbillno']=$mybillno;
      $mydate = mysqli_real_escape_string($db,$_POST['date']); 
      $myworkorder = mysqli_real_escape_string($db,$_POST['workorder']);
      $mycustomername = mysqli_real_escape_string($db,$_POST['customername']);
      $mymobile = mysqli_real_escape_string($db,$_POST['mobile']);
      $mygst = mysqli_real_escape_string($db,$_POST['gst']);
      $myaddress = mysqli_real_escape_string($db,$_POST['address']);
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $myitem = mysqli_real_escape_string($db,$_POST['item']);
      $myhsn = mysqli_real_escape_string($db,$_POST['hsn']); 
      $myprice = mysqli_real_escape_string($db,$_POST['price']);
      $myquantity = mysqli_real_escape_string($db,$_POST['quantity']);
      $myunit = mysqli_real_escape_string($db,$_POST['unit']);
      $myamount = mysqli_real_escape_string($db,$_POST['amount']);

      $sql="insert into billmaster(billno,date,workorder,customername,mobile,gst,address,email)
     values('$mybillno','$mydate','$myworkorder','$mycustomername','$mymobile','$mygst','$myaddress','$myemail');";
     
     $sql.="insert into billdetails(billno,item,hsn,price,quantity,unit,amount)
     values('$mybillno','$myitem','$myhsn','$myprice','$myquantity','$myunit','$myamount');";
     
     if($db->multi_query($sql)==true)
  {
    //
     //$blno=$_SESSION['sesbillno'];
     //echo $sql;
     //echo $blno;
     header("Location:updatebill.php");
  }
  else
  {
  echo "error:".$sql."<br>".$db->error;;
  }
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
  <a href="billmaster.php">Bill</a>
  <a href="viewitem.php">Item</a>
  <a href="viewcustomer.php">Customer</a>
  <a href="logout.php">Logout</a>
</div>
<div class="main">
    <a href='viewbill.php'>View</a>

<?php
   
   $sqlbill="SELECT MAX(billno) as billno from billmaster ";
                                          
                                           $resultbill=$db->query($sqlbill); 
                                           $countbill=$resultbill->num_rows;
                                           if(isset($countbill) and $countbill>0)
                                           {

                                           while($row1=$resultbill->fetch_assoc())
                                           {
                                            $no=1;
                                           $billno=$row1['billno']+$no;
                                         
                                          }

                                         } 

//echo $billno;
?>
 </div>
</body>
<body>
<div class="main">
      <form action = "" method = "post">
                  
        Bill no   <input type="text" name="txtbillno" value="<?php echo $billno;?>">
        Date <input type="Date" name="date" >
        Work order <input type="text" name="workorder" ><br/>
        Customer name  <input type="text" name="customername" >
        Mobile    <input type="text" name="mobile" >
        Gst <input type="text" name="gst" ><br/>
        address  <input type="text" name="address" >
        email    <input type="text" name="email" >

        item <input type="text" name="item" ><br/>
        hsn <input type="text" name="hsn" >
        price  <input type="text" name="price" >
        quantity  <input type="text" name="quantity" ><br/>
        unit <input type="text" name="unit" >
        amount <input type="text" name="amount" ><br/>


        <br/><input type = "submit" value = " submit "/><br/>
      </form>
    </div>
        </body>
               
               
               </html>
