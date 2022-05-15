<?php
include('a_session.php');

if(!isset($login_session)){
header('Location: adminlogin.php'); // Redirecting To Home Page
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
    margin: -34px -112px 60px;
}
  .form-areaa {
    padding: 10px 40px 60px;
  }

</style>

<script type="text/javascript">
    function display_alert()
    {
      alert("Data Updated Successfully...!!!");
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
             </li>
            </ul>
            
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

    

    
    <div class="col-xs-19">
      <div class="form-areaa">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> CUSTOMER FEEDBACKS </h3>

<?php



// Storing Session
$user_check=$_SESSION['admin'];
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{

  ?>
<div class="table-responsive" >
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr class="text-center">
        <th class="text-center" > Customer Email </th>
        <th class="text-center" > Customer Feedback </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <body>
    <tr>
      <td class="text-center"><?php echo $row["email"]; ?></td>
      <td class="text-center"><?php echo $row["message"]; ?></td>
    </tr>
  </body>
  
  <?php } ?>
  </table>
    <br>

  <?php } else { ?>

  <h4><center>NO FEEDBACKS</center> </h4>

  <?php } ?>

        </form>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
  </header>
  </body>
</html>

