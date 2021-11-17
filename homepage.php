<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
require "dbconfig/config.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">


</head>

<body>
	<?php
	if (isset($_POST["logout"])) {
		session_destroy();
		header("location:index.php");
	}
	?>

	<?php include("navbar.php"); ?>

	<div class="welcome">
		<h1>
			Welcome <?= $_SESSION['username']; ?>!
		</h1>
	</div>

	<div class="movielist">
		<h3>Choose a movie to review!</h3>
		<?php
		$query = "SELECT movie_name FROM movies";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($result)) {
			$name = $row['movie_name'];
			echo "<h4><a href='review.php?name=$name'> $name<br></a>
					</h4>";
		}
		?>
	</div>

</body>

</html>