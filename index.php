<!-- THERE IS ONE QUERY YOU NEED TO FILL FOR THIS FILE. IT IS ON LINE 24. done -->

<?php
	session_start();
	require "dbconfig/config.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link type="text/css" rel="stylesheet" href="style.css">
		<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>		
	</head>
	<body>
		<?php
			$username = $password = "";
			if(isset($_POST["login"])){
				$username = $_POST["username"];
				$password = $_POST["password"];

				// Fill in the blank query here to allow user to log into the page
				$query = "SELECT * from userinfo WHERE username = '$username' AND password = '$password' ";
				$query_run = mysqli_query($con, $query);

				if(mysqli_num_rows($query_run) > 0){
					$_SESSION["username"] = $username;
					header("location:homepage.php");
				}else{
					echo "<script> alert('Username or Password is incorrect.')</script>";
				}
			}
		?>
		
		<div>
			<h1 class="pagehead">
				LOGIN
			</h1>

			<h2>
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class = "loginbox">
					<div class = "loginfield">
						<span style="font-size: 20px; color: white;">
  							<i class="fas fa-user"></i>
						</span>
						<input type="text" placeholder="Your Username" name = "username" required>
					</div>

					<div class = "loginfield">
						<span style="font-size: 20px; color: white;">
							<i class="fas fa-lock"></i>
						</span>
						<input type="password" placeholder="Your Password" name = "password" required>
					</div>
					
					<div>
						<input type="submit" id="loginbtn" value="Login" name="login">
						<input type="button" id="regbtn" value="Register" onclick= "window.location.href = 'register.php'">
						<input type="button" id="chgbtn" value="Change Your Password" onclick= "window.location.href = 'changepassword.php'">
						<input type="button" id="delbtn" value="Delete Your Account" onclick= "window.location.href = 'delete.php'">
					</div>
				</form>
			</h2>
		</div>

	</body>
</html>