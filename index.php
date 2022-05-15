<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jane Nawang's Cake</title>

    <link rel="stylesheet" type = "text/css" href ="css/footer.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Bitter:wght@800&family=Concert+One&family=Dancing+Script&family=Inter:wght@300&family=Lobster&family=Lora:ital@1&family=Merienda+One&family=Praise&family=Raleway:ital,wght@1,500&family=Roboto+Condensed&family=Ubuntu+Condensed&display=swap" rel="stylesheet">

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
            font-size:90px;
            font-family: 'Amiri';
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
            margin: 20px 0;
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
        .form-contact {
            border-radius: 10px;
            width: 284px;
            border: 1px solid rgb(151, 121, 82);
            font-size: 15px;
            font-style: italic;
        }
        .btn-primary{
    font-size: 15px;
    font-style: italic;
    width: 95px;
    padding: -6px;
    border-radius:20px;
    background-color: rgb(92, 73, 46);
    color: #fff;
    border:none;
}
.btn-primary:hover{
      background-color: rgb(92, 73, 46);
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

                <div class="collapse navbar-collapse" id="menuicon">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="faqs.php">FAQS</a></li>
                    </ul>

                    <?php
                        if(isset($_SESSION['customer'])){
                    ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="cakes.php">Cakes </a></li>
                        <li><a href="cart.php">Cart  
                    (<?php
                        if(isset($_SESSION["cart"]))
                    {
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
                        <li><a href="customersignup.php">Sign Up </a></li>
                        <li><a href="customerlogin.php">Log in </a></li>
                    </ul>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
<div class="container">
    <div class="row">
        <div class="col-sm-6 banner-info">
            <center>
                <p class="big-text">Jane</p>
                <p class="big-text">Nawang Cakes</p>
                <p class="slogan">"Life's too short to say no to cake!"</p>
                    <a class="btn" href="customerlogin.php">Order Now</a></center>
        </div>
            <div class="col-sm-6 banner-image">
                <img src="images/cakes.png" class="img-responsive">
            </div>
        </div>
    </div>
<footer>
    <!-- Footer main -->
    <section class="ft-main">
        <div class="ft-main-item">
            <h2 style="font-size: 20px; color:white">About us</h2>
                <ul>
                    <li><h2 class="ft-title " >
                        Jane Nawang's Cake is a made to order<br>
                        cake small business owned by Ms. Maryjane<br>
                        Nawang Sarmiento where she makes different<br>
                        types of cakes such as customize cakes, wedding<br>
                        cakes, birthday cake, money cakes or anything<br>
                        that depends on customers’ choice.<br> </h2></li>
                </ul>
        </div>
        <div class="ft-main-item">
            <h2 style="font-size: 20px; color:white">Contact Information</h2>
            <ul>
                <li><h2 class="ft-title " ><span class= "glyphicon glyphicon-earphone"></span> (+63) 975-631-3818</h2></li>
                <li><h2 class="ft-title " ><span class= "glyphicon glyphicon-map-marker"></span>  Purok 5, Sangali Zamboanga City</h2></li>
            </ul>
        </div>
        <div class="ft-main-item">
            <h2 style="font-size: 20px; color:white">Contact us</h2>
            <form method="post" action="">
                <ul>
                    <li><input type="email" class="form-contact" id="email" name="email" placeholder="Email" required></li><br>
                    <li><textarea type="textarea" class="form-contact" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea></li>
                    <li><input type="submit" name="submit" type="button" id="submit" name="submit" onclick="display_alert()" class="btn btn-primary pull-right"/><li>
                 </ul>             
            </form>
        </div>
    </section>
<?php
    if (isset($_POST['submit'])){
    require 'connection.php';
    $conn = Connect();

$Email_Id = $conn->real_escape_string($_POST['email']);
$Message = $conn->real_escape_string($_POST['message']);

$query = "INSERT into contact(email,message) VALUES('$Email_Id','$Message')";
$success = $conn->query($query);

if (!$success){
  die("Couldnt enter data: ".$conn->error);
}

$conn->close();
}
?>
</footer>
</header>
</body>
</html>