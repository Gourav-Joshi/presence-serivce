<?php
	
	//Start Session
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

	//Connection Establish
	$conn = mysqli_connect("localhost", "root", "", "presenceservice") ;

	$email = $_GET['email'] ;
	$pwd = $_GET['password'] ;
	
	$query1 = "SELECT COUNT(email) as 'count' FROM `register` where email = '$email' ;" ;
	$result1 = mysqli_query($conn, $query1);
	$row = $result1->fetch_assoc() ;

	if($row['count'] == 1)
	{
		$query2 = "SELECT password FROM `register` where email = '$email' ;" ;
		$result2 = mysqli_query($conn, $query2);
	
		if($result2 == true)
		{
			$row = $result2->fetch_assoc() ;
			if(strcmp($row["password"], $pwd) == 0)
			{
				Select() ;	//STORING VALUES IN GLOBAL VARIABLES
				header('location: Dashboard.php') ;
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('Wrong Password') ;
				</script>";
				header('location: Error.html') ;
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>
					alert('Email id Exist') ;
				</script>";
		header('location: Registration.html') ;	
	}

	mysqli_close($conn);
?>