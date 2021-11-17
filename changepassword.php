<!-- THERE IS ONE QUERY YOU NEED TO FILL FOR THIS FILE. IT IS ON LINE 29. done -->


<?php
require "dbconfig/config.php"
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	$username = $password = $cpassword = "";
	if (isset($_POST["change"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$npassword = $_POST["npassword"];

		$query = "SELECT * from userinfo WHERE username ='$username' AND password = '$password'";
		$query_run = mysqli_query($con, $query);

		if (mysqli_num_rows($query_run) > 0) {
			// Fill in the query to update the user password with the new password that is submitted
			$query = "UPDATE userinfo SET password = '$npassword' WHERE username = '$username'";
			$query_run = mysqli_query($con, $query);
			echo "<script> alert('Password changed')</script>";
		} else {
			echo "<script> alert('Unable to change password')</script>";
		}
	}
	?>

	<div>
		<h1 class="pagehead">
			UPDATE
		</h1>

		<h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="loginbox">
				<div class="loginfield">
					<span style="font-size: 20px; color: white;">
						<i class="fas fa-user"></i>
					</span>
					<input type="text" placeholder="Your Username" name="username" required>
				</div>

				<div class="loginfield">
					<span style="font-size: 20px; color: white;">
						<i class="fas fa-lock"></i>
					</span>
					<input type="password" placeholder="Old Password" name="password" required>
				</div>

				<div class="loginfield">
					<span style="font-size: 20px; color: white;">
						<i class="fas fa-lock"></i>
					</span>
					<input type="password" placeholder="New Password" name="npassword" required>
				</div>

				<div>
					<input type="submit" id="chgbtn" value="Change password" name="change">
					<br>
					<input type="button" id="backbtn" value="Back to Login Page" onclick="window.location.href = 'index.php'">
				</div>
			</form>
		</h2>
	</div>

</body>

</html>