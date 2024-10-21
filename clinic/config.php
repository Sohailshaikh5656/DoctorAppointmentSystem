<?php
		

		$server = 'localhost';
		$username = "root";
		$password = "";
		$db = "project1";

		$conn = mysqli_connect($server,$username,$password,$db);

		if(!$conn)
		{
			die("Error".mysqli_connect_error());
		}

		// else
		// {
		// 	echo "connect";
		// }


?>