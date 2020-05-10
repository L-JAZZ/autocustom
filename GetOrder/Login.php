<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="slider.css" />
    <script type="text/javascript" src="scripts.js"></script>
    <script type="text/javascript" src="data.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="LoginScript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head> 

	
  <body>
  
      <div class="top-container">
        <div class="toplogo">
          <div class="logo-contaier" style="font-size: 30px">
            Our Project
            <span style="position: absolute;color:white;margin-left:1000px;font-size:10px">
						  <?php echo '<p>'.$_COOKIE['cook'].'</p>'; 
							error_reporting(0);
							ini_set('display_errors', 0); 
						  ?>
						  <a name="log" href="" style="color:white">Log out </a>
            </span>
            </div> 
          </div>
      </div>

    <section id ="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav mr-auto" >
            <li class="nav-item  ">
              <a class="nav-link" href="http://localhost/DB/AddPersonal/Login.php" style="color:white;">Input personal </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/MechanicAndManager/Register.php" style="color:white;">Input mechanic and manager</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/AddOrder/Login.php" style="color:white;">Input order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/AddClient/Login.php" style="color:white;">Input client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/AddVehicle/Login.php" style="color:white;">Input vehicle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/GetVehicle/Login.php" style="color:white;">Get vehicle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/GetPersonal/Login.php" style="color:white;">Get personal</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/DB/GetOrder/Login.php" style="color:white;">Get order</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>




  <div class="form" style="margin-top:35px;" id="first_form">
    <form class="register-form" action="">
      <input type="text" placeholder="name"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>

    <form class="login-form" action="Login.php" method="post">

      <button style="margin-bottom:10px;" id="sign" name="add" >Get order</button>
	  <br>

    </form>
  </div>
</div>



  </body>
</html>


<style>

</style>

 <?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "AutoCustom";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['add'])){
	$sql = "SELECT *FROM oorder order by OrderID limit 3";
  $max = "SELECT *FROM oorder where Bill = (SELECT MAX(Bill) FROM oorder) limit 1";
  $min= "SELECT *FROM oorder where Bill = (SELECT MIN(Bill) FROM oorder) limit 1";
		$result = $conn->query($sql);
    $res = $conn->query($max);
    $re = $conn->query($min);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style="text-align: center">'. "Bill: ".$row["Bill"]." | Date: ".$row["PlannedDateofComplete"]." | Type of work:".$row["TypeOfWork"]."<br>". '</p>';
		}
	}

  if ($res->num_rows > 0){
    while($raw = $res->fetch_assoc()){
      echo '<h1 style="text-align: center"> Order with maximum price </h1>';
      echo '<p style="text-align: center">'. "Bill: ".$raw ["Bill"]." | Date: ".$raw ["PlannedDateofComplete"]." | Type of work:".$raw ["TypeOfWork"]."<br>". '</p>';
    }
  }

  if ($re->num_rows > 0){
    while($raw = $re->fetch_assoc()){
      echo '<h1 style="text-align: center"> Order with minimum price </h1>';
      echo '<p style="text-align: center">'. "Bill: ".$raw ["Bill"]." | Date: ".$raw ["PlannedDateofComplete"]." | Type of work:".$raw ["TypeOfWork"]."<br>". '</p>';
    }
  }


$prodavg = "SELECT AVG(bill) as total FROM oorder";
$prodsrd = mysqli_query($conn, $prodavg);
$data=mysqli_fetch_assoc($prodsrd);
echo '<h1  style="text-align: center">Average order price: </h1> ';
echo '<p style="text-align: center">'.$data['total']."<br>". '</p>';


$prodsum = "SELECT SUM(bill) as total FROM oorder";
$prodsrd = mysqli_query($conn, $prodavg);
$data=mysqli_fetch_assoc($prodsrd);
echo '<h1  style="text-align: center">Sum of all order prices: </h1> ';
echo '<p style="text-align: center">'.$data['total']."<br>". '</p>';;
}
?>
