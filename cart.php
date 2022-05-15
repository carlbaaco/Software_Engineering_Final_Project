<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['customer'])){
header("location: customerlogin.php"); 
}
?>

<!DOCTYPE html>
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
<?php
if(!empty($_SESSION["cart"]))
{
?>

<div class="container">
    <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
    </div>
</div>
    <div class="table-responsive" style="padding-left: 10px; padding-right:10px;" >
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php  

                $total = 0;
                foreach($_SESSION["cart"] as $keys => $values)
                {
                ?>
                <tr>
                    <td><img src="<?php echo $values["cakeimage"]; ?>" class="img-responsive" style="width:80px;height:80px"></td>
                    <td><?php echo $values["cakename"]; ?></td>
                    <td>&#8369; <?php echo number_format($values["cakeprice"]); ?>.00</td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["cake_ID"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
                <?php 
                $total = $total + ($values["cakeprice"]);
                }
                ?>
                <tr>
                    <td colspan="2" align="right">Total</td>
                    <td align="right">&#8369; <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
        </table>
<?php
    echo 
    '<a href="cart.php?action=empty">
        <button class="btn btn-danger">
            <span class="glyphicon glyphicon-trash"></span> Empty Cart
        </button>
    </a>
    &nbsp;
    <a href="cakes.php">
        <button class="btn btn-warning">Continue Shopping</button>
    </a>
    &nbsp;
    <a href="checkout.php">
        <button class="btn btn-success pull-right">
            <span class="glyphicon glyphicon-share-alt"></span> Check Out
        </button>
    </a>';
    ?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
    ?>
    <div class="container">
        <div class="jumbotron" style="text-align: center;">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            <h1>Your Cart is Empty</h1>
            <p>Looks like you have not added anything to your cart.</p>
            <a class="btn" href="cakes.php">Order Now</a>
        </div>
    </div>
<?php
}
?>

<?php
if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "cake_ID");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'cakeID' => $_GET["id"],
'cakeimage' => $_POST["hidden_image"],
'cakename' => $_POST["hidden_name"],
'cakeprice' => $_POST["hidden_price"],
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Cake already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'cake_ID' => $_GET["id"],
'cakeimage' => $_POST["hidden_image"],
'cakename' => $_POST["hidden_name"],
'cakeprice' => $_POST["hidden_price"],
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{ 
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["cake_ID"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Cake has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{
unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
?>
<?php
?>
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
                <li><h2 class="ft-title " ><span class= "glyphicon glyphicon-earphone"></span>  (+63) 975-631-3818</h2></li>
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