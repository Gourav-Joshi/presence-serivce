<?php
	session_start() ;
	if(session_start())
	$user = $_SESSION["user"] ;
	$fname = $_SESSION["fname"] ;
	$date = date('Y-m-d H:i:s') ;
	$conn = mysqli_connect("localhost", "root", "", "presenceservice") ;
		
	$check = "SELECT * FROM viewers WHERE user_id = '$user' AND file_name = 'Document 1' ;" ;
	$result = mysqli_query($conn, $check) ;
	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) == 0)
	{	
		$query = "INSERT INTO viewers VALUES ($user, '$fname', 'Document 1', '$date');" ;
		$result = mysqli_query($conn, $query) ;
	}
	else
	{
		$query = "UPDATE  viewers SET last_time = '$date' WHERE user_id = '$user' AND file_name = 'Document 1' ;" ;
		$result = mysqli_query($conn, $query) ;
	}

	$que = "SELECT f_name, last_time FROM viewers ;" ;
	$out = mysqli_query($conn, $que) ;

?>


<!DOCTYPE html>
<html>
<head>
	<title>Document 1 || Presence Service</title>
	<link rel="stylesheet" type="text/css" href="css\document.css">
</head>
<body>
	<table align="center" border="2px">
		<tr>
			<h2 style="text-align: center; margin: auto;">Past Viewers of this page</h2>
		</tr>
		<tr>
			<th>Name</th>
			<th>Last Time</th>
		</tr>
		<?php
			while($row = mysqli_fetch_assoc($out))
			{
		?>
				<tr>
					<td><?php echo $row['f_name']; ?></td>
					<td><?php echo $row['last_time']; ?></td>
				</tr>
		<?php		
			}
		?>
	</table>
</body>
</html>