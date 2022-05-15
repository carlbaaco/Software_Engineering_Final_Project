<?php
include('a_session.php');

if (isset($_GET['id'])){
  $id=$_GET['id'];
  $delete=mysqli_query($conn,"DELETE FROM cakes WHERE cake_ID = $id");
}
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
  .form-control{
    border-radius: 10px;
    border: 1px solid rgb(151, 121, 82);
    font-size: 15px;
    font-style: italic;
}

.btn-primary{
    font-size: 15px;

    font-style: italic;
    width: 100%;
    padding: -6px;
    border-radius:20px;
    background-color:rgb(151, 121, 82);
    color: #fff;
    border:none;
}
.btn-primary:hover{
  background-color:rgb(151, 121, 82);
} 
</style>

<script type="text/javascript">
    function display_alert()
    {
      alert("Data Updated Successfully...!!!");
    }
    function display_remove()
    {
      alert("Cake has been removed!");
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
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> LIST OF CAKES </h3>

<?php



// Storing Session
$user_check=$_SESSION['admin'];
$sql = "SELECT * FROM cakes";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{

  ?>
<div class="table-responsive" style="padding-left: 10px; padding-right: 10px;">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr class="text-center">
        <th class="text-center">Image</th>
        <th class="text-center">Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Price</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <body>
    <tr>
      <td align="center"><img src="<?php echo $row["cakeimage"]; ?>" class="img-responsive" style="width:60px;height:60px"></td>
      <td class="text-center"><?php echo $row["cakename"]; ?></td>
      <td class="text-center"><?php echo $row["cakesize"]; ?></td>
      <td class="text-center">&#8369; <?php echo $row["cakeprice"]; ?>.00</td>
      <td class="text-center"><a href="view_cake.php?id=<?php echo $row["cake_ID"]; ?>" onclick="display_remove()"><span class="text-danger">Remove</span></a><br>
      <a onclick="openForm()" href="view_cake.php?update=<?php echo $row["cake_ID"]; ?>" ><span class="text-danger">Edit</span></a></td>
    </tr>
  </body>
  
  <?php } ?>
  </table>
    <br>

  <?php } else { ?>

  <h4><center>NO CAKES</center> </h4>

  <?php } ?>

        </form>
        </div>
    </div>
</div>
        <?php
   
   if (isset($_GET['submit'])) {
   $C_ID = $_GET['dfid'];
   $name = $_GET['dname'];
   $size = $_GET['dsize'];
   $price = $_GET['dprice'];



   $query = mysqli_query($conn, "UPDATE cakes set
   cakename='$name', cakesize='$size', cakeprice='$price' where cake_ID='$C_ID'");
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
    $query1 = mysqli_query($conn, "SELECT * FROM cakes WHERE cake_ID=$update");
    while ($row1 = mysqli_fetch_array($query1)) {

    ?>

     <div class="container">
<div class="col-md-6">
 <div class="form-area">
        <form action="view_cake.php" method="GET">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> EDIT YOUR CAKES HERE </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="dfid" value=<?php echo $row1['cake_ID'];  ?> />
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Cake Name: </label>
            <input type="text" class="form-control" id="dname" name="dname" value=<?php echo $row1['cakename'];  ?> placeholder="Your Cake name" required="">
          </div>     

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Cake Size: </label>
            <input type="text" class="form-control" id="dsize" name="dsize" value=<?php echo $row1['cakesize'];  ?> placeholder="Your Cake Size" required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Cake Price: </label>
            <input type="text" class="form-control" id="dprice" name="dprice" value=<?php echo $row1['cakeprice'];  ?> placeholder="Your Cake Price" required="">
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
        
        </div>

<br>
<br>
<br>
<br>
  </header>
  </body>
</html>

