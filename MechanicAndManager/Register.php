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
            <li class="nav-item active">
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
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/GetOrder/Login.php" style="color:white;">Get order</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>


   
	<center>
<div class="tab" style ="margin-top:50px;">
  <button class="tablinks" onclick="changeTab(event,'login-box')">Mechanic</button>
  <button class="tablinks" onclick="changeTab(event,'login-boxx')">Manager</button>
</div> 
</center>


<div class="tabcontent" id="login-box" style="display: none;">
  <div class="form" style="margin-top:60px;">
  
    <form class="login-form" action="Register.php" method="post">
	<H1  style="margin-top:-15px;">Registeration of mechanic</h1>
    <input type="text" placeholder="Mechanic ID" name="mechanicID"/>
	   <input type="text" placeholder="Car ID"id="email" name="CarID"/>
      <input type="text" placeholder="Personal ID" id="inputPassword" name="PersonalID"/>
      <button style="margin-bottom:10px;" name="addmech">Add mechanic</button>
	  <br>
	
    
    </form>
  </div>

  
</div>
  
 <div class="tabcontent" id="login-boxx" style="display: none;">
 <div class="form" style="margin-top:60px;">
   
    <form class="login-form" action="Register.php" method="post">
	<H1 style="margin-top:-15px;">Registeration of manager</h1>
	  <input type="text" name="Bill" placeholder="Bill" id="emaila">
  <input type="text" name="ManagerID" placeholder="Manager ID" />
  	  <input type="text" name="PersonallID" placeholder="Personal ID" />
   
	 
       <button name="addman" > Add manager</button>
	  <br>
	 
    </form>
  </div>
  
</div>


<script>

</script>

   
  </body>
</html>


 <?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "AutoCustom";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['addmech'])){
	$mechid = $_POST['mechanicID'];
	$carid = $_POST['CarID'];
	$persid = $_POST['PersonalID'];
	$sql = "INSERT INTO mechanic(MechanicID, CarID, PersonID) VALUES('$mechid', '$carid', '$persid')";
	 if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>

 <?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "AutoCustom";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['addman'])){
	$bill = $_POST['Bill'];
	$manid = $_POST['ManagerID'];
	$perssid = $_POST['PersonallID'];
	$sql = "INSERT INTO manager(Bill, ManagerID	, PersonID) VALUES('$bill', '$manid', '$perssid')";
	 if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>









