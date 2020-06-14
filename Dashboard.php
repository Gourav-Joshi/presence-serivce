<?php
session_start() ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard || Presence Service</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css\Dashboard.css">
	<!-- CSS End -->
</head>
<body>
	<header class = "header ">
		<a href="Dashboard.php">	
			<img class="logo-class" src="img\logo-1.jpg" alt="Logo Image" width="100px; height:75% ;">
		</a>
		<div class = "heading">
			<h2>Presence Service by Gourav Joshi</h2>
		</div>
		<div class="menu">
			<?php
			$email_x = $_SESSION["email"] ;
			$con = mysqli_connect("localhost", "root", "", "presenceservice") ;
			$que = "SELECT * FROM register WHERE email = '$email_x' ;" ;
			$result = mysqli_query($con, $que) ;
			$out = mysqli_fetch_array($result) ;
			$img =  $out['awatar_path'] ;
			echo "<img style='border-radius:50px ;' src= " .$img. " width='50px' height='50px'>";
			echo "<h3>".$_SESSION["fname"]."</h3>";
			?>
			<h3><a href="logout.php" title="Logout Button">Logout</a></h3>	
		</div>
	</header>

	<nav class="navigation-side">
		<div class="option-class">
			<a href=" " title="Link 1">	Link 1</a>
		</div>
		<div class="option-class">
			<a href=" " title="Link 2">	Link 2</a>
		</div>
	</nav>

	<hero>
		<div class="hero">
			
		</div>
	</hero>
</body>
</html>