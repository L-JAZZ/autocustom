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
            <li class="nav-item active">
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
            <li class="nav-item">
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
 
		<input type="text" placeholder="Bill" name="bill">
		<input type="text" placeholder="Problem info" name="problem">
      <input type="text" placeholder="Planned date of complete" name="planned"/>
	  <input type="text" placeholder="Real date of complete" name="real"/>
	  <input type="text" placeholder="Date" name="date"/>
	  <input type="text" placeholder="Type of work" name="type"/>
	   <input type="text" placeholder="Order ID" name="orderid"/>
	   <input type="text" placeholder="Client ID" name="clientid"/>
      <button style="margin-bottom:10px;" id="sign" name="add" >Add order</button>
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
	 
	$bill= $_POST['bill'];
	$problem = $_POST['problem'];
	$planned= $_POST['planned'];
	$real = $_POST['real'];
	$date = $_POST['date'];
	$type=  $_POST['type'];
	$orderid = $_POST['orderid'];
	$clientid = $_POST['clientid'];
	
	$sql = "INSERT INTO oorder (Bill, probleminfo, PlannedDateofComplete, RealDateofComplete, Date, TypeOfWork, OrderID,ClientID) 
	VALUES('$bill ','$problem','$planned','$real','$date', '$type', '$orderid', '$clientid')";
	 if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>


