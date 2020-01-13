 <?php
include('session.php');
//include("config.php");
//session_start();
if(isset($_SESSION['sesbillno']) and  !empty($_SESSION['sesbillno'])) 
{
 

  $blno=$_SESSION['sesbillno'];
  $sql="select * from billmaster where billno='$blno'";
echo $sql;
echo $blno;
}




// include('config.php');
  //




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


<div class="main">
      <form action = "" method = "post">
         
        Bill no   <input type="text" name="billno" value=""><br/>
                  
        item <input type="text" name="item"><br/>
        hsn <input type="text" name="hsn"><br/>
        price  <input type="text" name="price" ><br/>
        quantity  <input type="text" name="quantity"><br/>
        unit <input type="text" name="unit"><br/>
        amount <input type="text" name="amount"><br/>


        <br/><input type = "submit" value = " submit "/><br/>
      </form>
    </div>
        </body>
               
               
               </html>
