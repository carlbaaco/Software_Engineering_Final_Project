<?php
session_start();

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
        .text-info,.text-dark,.text-danger{
        color: rgb(92, 73, 46);
            font-size: 17px;
        }
        .mypanel{
        border: 1px solid #eaeaec; 
        margin: 20px 19px 30px -1px; 
        box-shadow: 0 1px 2px rgba(0,0,0,0.05); 
        background-color: #FAFAFA;  
        padding:15px;
        border-radius: 5px;
        }
        .btn-success{
        background-color: rgb(92, 73, 46);
        border-radius:16px;
        border:none;
        color: white;
        padding: 10px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        }
        .btn-success:hover{
            background-color: #deb884;
            color:rgb(92, 73, 46);
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/slide1.png" style="width:100%;">
                <div class="carousel-caption"></div>
        </div>
        <div class="item">
            <img src="images/slide1.png" style="width:100%;">
                <div class="carousel-caption"></div>
        </div>
        <div class="item">
            <img src="images/slide1.png" style="width:100%;">
                <div class="carousel-caption"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container" style="width:95%;">
    <!-- Display all cakes -->
    <?php
    require 'connection.php';
    $conn = Connect();

    $sql = "SELECT * FROM cakes ORDER BY cake_ID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
    $count=0;

    while($row = mysqli_fetch_assoc($result)){
        if ($count == 0)
            echo "<div class='row'>";
    ?>
    <div class="col-md-3">
        <form method="post" action="cart.php?action=add&id=<?php echo $row["cake_ID"]; ?>">
            <div class="mypanel" align="center";>
                <img src="<?php echo $row["cakeimage"]; ?>" class="img-responsive">
                <h4 class="text-dark"><?php echo $row["cakename"]; ?></h4>
                <h5 class="text-info">Size: <?php echo $row["cakesize"]; ?></h5>
                <h5 class="text-danger">Price: &#8369; <?php echo $row["cakeprice"]; ?>.00</h5>
                    <input type="hidden" name="hidden_image" value="<?php echo $row["cakeimage"]; ?>">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["cakename"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["cakeprice"]; ?>">
                    <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
            </div>
        </form>  
    </div>

    <?php
    $count++;
    if($count==4)
    {
    echo "</div>";
    $count=0;
    }
    }
    ?>

</div>
</div>
<?php
}
else
{
  ?>

<div class="container">
    <div class="jumbotron">
        <center>
            <label style="margin-left: 5px;color:rgb(92, 73, 46);"> <h1>Oops! No cake is available.</h1> </label>
        </center>   
    </div>
</div>
<?php
}
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