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
  <link rel="stylesheet" type = "text/css" href ="css/footer.css">
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

.glyphicon-shopping-cart{
  color: rgb(92, 73, 46);
  font-size:200px;
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
.jumbotron{
  background-color: white;
}
.form-contact {
    border-radius: 10px;
    width: 284px;
    border: 1px solid rgb(151, 121, 82);
    font-size: 15px;
    font-style: italic;
}

</style>
<script type="text/javascript">
    function display_alert()
    {
      alert("Thank you! Your message has been submitted successfully.");
    }
  </script>
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
            <li><a href="faqs.php">Contact Us</a></li>

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

 <?php
$total = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {   
    $name = $values["cakename"];
    $price =  $values["cakeprice"];
    $username = $_SESSION["customer"];
    $orderdate = date('Y-m-d');
    $ordertime = date('h:i:s A');


    $total = $total + ($values["cakeprice"]);


     $query = "INSERT INTO orders (cakename, cakeprice, username, orderdate, ordertime) 
              VALUES ('" . $name . "','" . $price . "','" . $username . "','" . $orderdate . "','" . $ordertime . "')";
             

              $success = $conn->query($query);         

      if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>

        <?php
      }
      
  }

        ?>
        <div class="container">
          <div class="jumbotron">
            <h2>As of the moment, we only offer Cash On Pick-up.</h2>
          </div>
        </div>
        <br>

<h1 class="text-center">Grand Total<br> &#8369;<?php echo "$total"; ?>.00</h1>
<h5 class="text-center">Please prepare &#8369;<?php echo "$total"; ?>.00 on the day of Pick-up date.</h5>
<br>

<h1 class="text-center">
  <a href="cart.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
  <a href="pickup.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Pick-up</button></a>
</h1>

<br><br><br><br><br><br>

    </header>
</body>
</html>