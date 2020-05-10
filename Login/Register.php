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
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/DB/AddClient/Login.php" style="color:white;">Input client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/AddVehicle/Login.php" style="color:white;">Input vehicle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/GetVehicle/Login.php" style="color:white;">Get vehicle</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="http://localhost/DB/GetPersonal/Login.php" style="color:white;">Get personal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/DB/GetOrder/Login.php" style="color:white;">Get order</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>
   
	


<div class="tabcontent" id="login-box" >
  <div class="form" style="margin-top:60px;">
  
    <form class="login-form" action="Register.php" method="post">
	<H1  style="margin-top:-15px;">Sign in</h1>
	   <input type="text" placeholder="Email"id="email" name="email"/>
      <input type="password" placeholder="password" id="inputPassword" name="password"/>
      <button style="margin-bottom:10px;" name="loginasclient">Login</button>
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
							$email= $_POST['email'];

							if ($conn->connect_error) {
	    					die("Connection failed: " . $conn->connect_error);
								}

							$sqll = "SELECT * FROM client where email='$email'";
							$result = $conn -> query($sqll);

							if ($result -> num_rows>0){

								while ($raw = $result-> fetch_assoc()){
									$var = $raw['email'];
									setcookie("cook", "$var", time() + 86400, '/', NULL, 0);
								}
							}
						
							if (isset($_POST['log'])){
								echo '<script>alert("Login has been deleted");</script>';
								setcookie("cook", "$var", time() - 86400);
							}			
?>












