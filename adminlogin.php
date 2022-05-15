<?php
include('a_login.php'); // Includes Login Script

if(isset($_SESSION['admin'])){
header("location: view_cake.php"); //Redirecting to myrestaurant Page
}
?>

<!DOCTYPE html>
<html>

  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN | Jane Nawang's Cake</title>
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
    background-color: #deb884;
    border-radius: 10px;
    padding: 10px 30px 20px;
    margin-top: 50px;
    border: 2px solid rgb(151, 121, 82);
    opacity:0.9;
    
}
.help-block{

    font-size: 15px;
    font-style: italic;
    color: rgb(92, 73, 46);
}

.form-control{
    border-radius: 10px;
    border: 1px solid rgb(151, 121, 82);
    font-size: 15px;
    font-style: italic;
}
.form-control:focus{
    border: 1px solid rgb(151, 121, 82);
}

.contact{
    font-style: italic;
    color: rgb(92, 73, 46);
    margin-bottom: 20px; 
    margin-top: 0px;
    text-align: center; 
    font-size: 40px;
}
.feedback{
    font-size:30px;
    font-family: Trebuchet MS;
    font-style: italic;
    margin: 50px 0px;
}
.cake-image{
    height: 320px;
    width: 320px;
    margin: 30px 0px;
}
.btn-primary{
    font-size: 15px;
    font-style: italic;
    width: 40px;
    padding: -6px;
    border-radius:20px;
    background-color:rgb(151, 121, 82);
    color: #fff;
    border:none;
}
.btn-primary:hover{
    background-color:rgb(151, 121, 82);
} 
.btn-submit:hover{
    background-color:white;
    border: 1px solid rgb(151, 121, 82);
    color: rgb(151, 121, 82);
    transition: 0.3s
} 
.btn-submit{
    font-size: 15px;
    font-style: italic;
    width: 100%;
    padding: 10px;
    border-radius:20px;
    background-color:rgb(151, 121, 82);
    color: #fff;
   text-align: center; 
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


<?php
if(isset($_SESSION['admin'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> Welcome, Admin</a></li>
            <li><a href="add_cake.php">ADMIN CONTROL PANEL</a></li>
            <li><a href="a_logout.php"></span> Log Out </a></li>
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

   
    <div class="container" >
        <div class="col-md-5" style="float: none; margin: 0 auto;">
            <div class="form-area">
            <form method="post" action="">
                <br style="clear: both">
                <h3 class="contact">ADMIN</h3>
          
        <form action="" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
          
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
            </span>
              </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
              <button class="btn btn-submit" name="submit" type="submit" value=" Login ">Log in</button>
          </div>

        </div>
        </form>
        </div>     
      </div>      
    </div>
    </div>
    </header>


    </body>
</html>