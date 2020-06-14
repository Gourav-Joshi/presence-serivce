<?php
	session_start() ;

	function Select() {
		echo "<script type='text/javascript'>
					alert('SESSION') ;
				</script>";
		$email = $_GET['email'] ;
		
		$connection = mysqli_connect("localhost", "root", "", "presenceservice") ;
		$sql = "SELECT * FROM `register` where email = '$email' ;" ;
		$res = mysqli_query($connection, $sql);
		$out = $res->fetch_assoc() ;
		$_SESSION["user"] = $out["user_id"] ;
		$_SESSION["fname"] = $out["f_name"] ;
		$_SESSION["lname"] = $out["l_name"] ;
		$_SESSION["email"] = $out["email"] ;
		$_SESSION["dob"] = $out["date_of_birth"] ;
		$_SESSION["phone"] = $out["phone"] ;
		$_SESSION["avatar"] = $out["awatar_path"] ;
		$_SESSION["password"] = $out["password"] ;
	}

	$avatar = array("1.jpg", "2.png", "3.png", "4.png", "5.jpg") ;
	$avatar_path = $avatar[rand(0,4)] ; 
	//Connection Establish
	$conn = mysqli_connect("localhost", "root", "", "presenceservice") ;

	$fname = $_GET['first_name'] ;
	$lname = $_GET['last_name'] ;
	$DOB = $_GET['birthday'] ;
	$email = $_GET['email'] ;
	$phone = $_GET['phone'] ;
	$pwd = $_GET['password'] ;
	$confirm = $_GET['confirmPassword'] ;

	if (strcmp($pwd, $confirm) == 0)
	{
		$query = "INSERT INTO register VALUES (DEFAULT, '$fname', '$lname', '$email', '$DOB', $phone, '$avatar_path', '$pwd');" ;

		$result = mysqli_query($conn, $query);
		
		if($result == true)
		{
			echo "You did it.";
			Select();
			header('location: Dashboard.php') ; // Transfer to Dashboards
		}
		else
		{
			echo "<script type='text/javascript'>
				alert('Dont Register with Already Registered Credenetials!!! Try Again')
			</script>";
			header('location:Error.html') ;
		}
	}
	else
	{
		echo "<script type='text/javascript'>
				alert('INVALID PASSWORD ')
			</script>";
		header('location:Error.html') ;

	}

	mysqli_close($conn);
?>