<?php

include('a_session.php');

if(!isset($login_session)){
header('Location: adminlogin.php'); 
}

$cakename = $conn->real_escape_string($_POST['cakename']);
$cakesize = $conn->real_escape_string($_POST['cakesize']);
$cakeprice = $conn->real_escape_string($_POST['cakeprice']);
$cakeimage = $conn->real_escape_string($_POST['cakeimage']);

$query = "INSERT INTO cakes(cakename,cakesize,cakeprice,cakeimage) VALUES('" . $cakename . "','" . $cakesize . "','" . $cakeprice . "','" . $cakeimage . "')";
$success = $conn->query($query);

if (!$success){

	?>

<!DOCTYPE html>
<html>

  <head>
  <title>ADMIN | Jane Nawang's Cake</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">

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
    font-family: Trebuchet MS;
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
          <a href="#"><img class="logo" src="images/logo.png"></a>
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
</header>
	</body>
	
	</html>

	<?php
	
}
else {
	echo "SUCCESS";
	header('Location: add_cake.php');
}

$conn->close();

?>