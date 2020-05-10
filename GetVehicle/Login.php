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
            <li class="nav-item active">
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
 
		<input type="text" placeholder="Type" name="type">
      <input type="text" placeholder="Engine volume" name="engine"/>
	  <input type="text" placeholder="Brand" name="brand"/>
	  <input type="text" placeholder="Year of production" name="year"/>
	  <input type="text" placeholder="Car ID" name="carid"/>
	   <input type="text" placeholder="Client ID" name="clientid"/>
      <button style="margin-bottom:10px;" id="sign" name="add" >Find by type</button>
	     <button style="margin-bottom:10px;" id="sign" name="eng" >Find by engine volume</button>
		 <button style="margin-bottom:10px;" id="sign" name="brn" >Find by brand</button>
		 	 <button style="margin-bottom:10px;" id="sign" name="own" >Find by owner</button>
			 	 <button style="margin-bottom:10px;" id="sign" name="all" >Get all</button>
	  <br>
   
    </form>


  </div>
</div>



  </body>
</html>


<style>

</style>
<div style="text-align:center;">
 <?php
  error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "AutoCustom";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	$type = $_POST['type'];
	$engine = $_POST['engine'];
	$brand = $_POST['brand'];
	$year =  $_POST['year'];
	$carid = $_POST['carid'];
	$clientid = $_POST['clientid'];


	
if (isset($_POST['add'])){ 

	
	$sql = "SELECT cl.firstname, vh.brand, vh.type, vh.EngineVol FROM VEHICLE vh, Client cl where  vh.type = '$type' and cl.clientid = vh.clientid order by vh.carid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style = "text-align:center">'."Name: ".$row["firstname"]."|  Brand: ".$row["brand"]."| Type: ".$row["type"]."| Engine: ".$row["EngineVol"]."<br>".'</p>';
		}
	}
	}
if (isset($_POST['eng'])){ 
	
	$sql = "SELECT cl.firstname, vh.brand, vh.type, vh.EngineVol FROM VEHICLE vh, Client cl where  vh.enginevol = '$engine' and cl.clientid = vh.clientid order by vh.carid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style = "text-align:center">'."Name: ".$row["firstname"]."|  Brand: ".$row["brand"]."| Type: ".$row["type"]."| Engine: ".$row["EngineVol"]."<br>".'</p>';
		}
	}
	}
	
	if (isset($_POST['brn'])){ 
	$sql = "SELECT cl.firstname, vh.brand, vh.type, vh.EngineVol FROM VEHICLE vh, Client cl where  vh.brand = '$brand' and cl.clientid = vh.clientid order by vh.carid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style = "text-align:center">'."Name: ".$row["firstname"]."|  Brand: ".$row["brand"]."| Type: ".$row["type"]."| Engine: ".$row["EngineVol"]."<br>".'</p>';
		}
	}
	}
	
		if (isset($_POST['own'])){ 
	$sql = "SELECT cl.firstname, vh.brand, vh.type, vh.EngineVol FROM VEHICLE vh, Client cl where cl.clientid = '$clientid' order by vh.carid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style = "text-align:center">'."Name: ".$row["firstname"]."|  Brand: ".$row["brand"]."| Type: ".$row["type"]."| Engine: ".$row["EngineVol"]."<br>".'</p>';
		}
	}
	}
		if (isset($_POST['all'])){ 
	$sql = "SELECT cl.firstname, vh.brand, vh.type, vh.EngineVol FROM VEHICLE vh, Client cl where cl.clientid = vh.clientid order by vh.carid ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<p style = "text-align:center">'."Name: ".$row["firstname"]."|  Brand: ".$row["brand"]."| Type: ".$row["type"]."| Engine: ".$row["EngineVol"]."<br>".'</p>';
		}
	}
	}


	
?>
<div>