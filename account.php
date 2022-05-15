<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['customer'])){
header("location: customerlogin.php"); 
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jane Nawang's Cake</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
       @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
    margin: 0;
    padding: 0;
}
.header{
    height: 100vh;    
}
.navbar-style{
    box-shadow: 0 5px 10px #efefef;
    text-transform:uppercase;
}
.logo{
    height: 48px;
    padding: 2px 10px;
    border-radius:16px;
}
.icon-bar{
  background-color: rgb(151, 121, 82);  
}

.navbar-nav li a{
    color: rgb(92, 73, 46);
    font-size: 18px;
    font-family: 'Poppins', sans-serif;
}

.big-text{
    font-size:80px;
    font-family: Trebuchet MS;
    margin: -15px 0;
    color: rgb(92, 73, 46);
}    

.slogan{
    font-size:30px;
    font-family: Trebuchet MS;
    font-style: italic;
    margin: 30px 0px;
}

a.btn{
    font-size: 15px;
    margin: 20px 10px;
    width: 150px;
    padding: 10px;
    border-radius:20px;
    background-color:rgb(151, 121, 82);
    color: #fff;
}
a.btn:hover{
    border: none;
    color: #fff;
    box-shadow: 5px 5px 10px #999;
    transition: 0.3s;
}

.banner-info, .banner-image{
    margin: 30px 0;
}

.form-area {
    padding: 10px 40px 60px;
    margin: 10px 0px 60px;
    border-radius: 10px;
    background-color: #deb884;
    border: 2px solid rgb(151, 121, 82);
    opacity:0.9;
    box-shadow: 5px 5px 10px #999;
}

</style>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-style">
            <div class="container">
                <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuicon">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php"><img class="logo" src="images/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse " id="menuicon">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
              <li><a href="contactus.php">FAQS</a></li>


          </ul>

<?php
if(isset($_SESSION['customer'])){

?>


<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="cakes.php">Cakes </a></li>
            <li><a href="cart.php">Cart  
              (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="u_logout.php">Log Out </a></li>
          </ul>

  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
  <li>
    <a href="customersignup.php">Sign Up </a>
  </li>
  <li>
    <a href="customerlogin.php">Log in </a>
</li>
</ul>

<?php
}
?>


        </div>

      </div>
    </nav>
    <a onclick="openForm()" href="account.php?update=<?php echo $row["customer_ID"]; ?>" ><span class="text-danger">Edit</span></a>
<?php
    if (isset($_GET['submit'])) {
   $customer_ID = $_GET['customer_ID'];
   $fullname = $_GET['fullname'];
   $username = $_GET['username'];
   $email = $_GET['email'];
   $contact = $_GET['contact'];
   $address = $_GET['address'];
   $password = $_GET['password'];

   $query = mysqli_query($conn, "UPDATE customer set
   fullname='$fullname', username='$username', email='$email',contact='$contact', address='$address', password='$password' where customer_ID='$customer_ID'");
    }
   $query = mysqli_query($conn, "SELECT * FROM cakes ORDER BY cake_ID");
   while ($row = mysqli_fetch_array($query)) {

     ?>
     <?php
    }
    ?>
    

    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query1 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_ID=$update");
    while ($row1 = mysqli_fetch_array($query1)) {

    ?>

     <div class="container">
<div class="col-md-6">
 <div class="form-area">
        <form action="account.php" method="GET">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> EDIT YOUR FOOD ITEMS HERE </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="customer_ID" value=<?php echo $row1['customer_ID'];  ?> />
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Full name </label>
            <input type="text" class="form-control" id="fullname" name="dname" value=<?php echo $row1['fullname'];  ?> placeholder="Your Full name" required="">
          </div>     

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username </label>
            <input type="text" class="form-control" id="username" name="dsize" value=<?php echo $row1['username'];  ?> placeholder="Your Username" required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span>Email </label>
            <input type="text" class="form-control" id="email" name="dprice" value=<?php echo $row1['email'];  ?> placeholder="Email" required="">
          </div>
               <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Contact </label>
            <input type="text" class="form-control" id="contact" name="dsize" value=<?php echo $row1['contact'];  ?> placeholder="Contact" required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span>Address </label>
            <input type="text" class="form-control" id="address" name="dprice" value=<?php echo $row1['address'];  ?> placeholder="Address" required="">
          </div>

               <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span>Password </label>
            <input type="password" class="form-control" id="password" name="dprice" value=<?php echo $row1['password'];  ?> placeholder="Password" required="">
          </div>


          

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" onclick="display_alert()" value="Display alert box" > Update </button>    
      </div>
        </form>



    <?php
}
}


  ?>
      
  </div>




</div>


<?php
mysqli_close($conn);
?>
</div>
    

   </header>
</body>
</html>