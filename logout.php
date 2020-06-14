<?php
	session_start() ;
	if(isset($_SESSION['email']))
   	{
    	session_destroy();//des
        header("Location:Login.html");
   	}
?>