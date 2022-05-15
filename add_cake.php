<?php
include('a_session.php');

if(!isset($login_session)){
header('Location: adminlogin.php'); 
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN|Jane Nawang's Cake</title>

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
            font-family: 'Poppins', sans-serif;
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
        }
</style>
    <script type="text/javascript">
        function display_alert()
        {
            alert("New cake is successfully added.");
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
                        <a href="#"><img class="logo" src="images/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse " id="menuicon">
                    <?php
                    if(isset($_SESSION['admin'])){
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"> Welcome, Admin</a></li>
                            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN CONTROL PANEL</a>
                                <ul class="dropdown-menu">
                                    <li><a href="view_cake.php">Manage Cakes</a></li>
                                    <li><a href="add_cake.php">Add New Cakes</a></li>
                                    <li><a href="view_order.php">View Order Details</a></li>
                                    <li><a href="customerprofile.php">View Customers Profile</a></li>
                                    <li><a href="feedback.php">Customer Feedbacks</a></li>
                                </ul>
                            </li>
                            <li><a href="a_logout.php">Log Out </a></li>
                        </ul>
                    <?php        
                    }
                    else {
                        ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
<div class="col-md-5 col-md-offset-4">
    <div class="form-area">
        <form action="add_cake1.php" method="POST">
            <br style="clear: both">
            <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW CAKE HERE </h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="cakename" name="cakename" placeholder="Cake Name" required="">
                </div>  
                <div class="form-group">
                    <input type="text" class="form-control" id="cakesize" name="cakesize" placeholder="Cake Size" required="">
                </div>   
                <div class="form-group">
                    <input type="text" class="form-control" id="cakeprice" name="cakeprice" placeholder="Cake Price" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="cakeimage" name="cakeimage" placeholder="Cake Image Path [e.g. images/Cake 1.png]" required="">
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right" onclick="display_alert()"> ADD CAKE</button>    
                </div>
        </form>
    </div>
</div>
</header>
</body>
</html>