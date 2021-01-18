<?php
session_start();
if (isset($_SESSION['name'])){
    header('location: students.php');
}
$error="";
include 'connect.php';
include 'link.php';
if(isset($_POST['submit'])){
	$uname = $_POST['username'];
	$upass = $_POST['pass'];
  
  
	$sql = "SELECT *  FROM admin where admin_username='$uname' and admin_pass='$upass'";
  
	$result =mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
  if($result->num_rows===1)
  {
	  $_SESSION['name']=$row['admin_name'];
	  $_SESSION['id']=$row['admin_id'];
	  header('location:students.php');
	  
  }
	else{
	  $error="Username or Password Incorrect ";
  
	}
  }
  
  
  
  
  mysqli_close($conn);

?>

<html>	
<head>
<title>Login</title>
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			<p class="error bg-warning ml-5 mr-5"  align="center" >
  				<?php echo "$error"; ?></p>
				<form method='POST' class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" autocomplete="on" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type='submit' name='submit' class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

</body>
</html>
