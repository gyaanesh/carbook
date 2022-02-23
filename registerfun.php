<?php

include_once 'include/adminConfig.php';
// print_r($_POST);
	if (isset($_POST)) 
	{
		$output = [];
		$name 	= $_POST['username'];
		$email 	= $_POST['email'];
		$phone 	= $_POST['phone'];
		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `Email`= '$email' "))) 
		{
		// echo "i have";
			$output['status']  = "409";
			$output['message']  = "This email is Already registred. Please Login";
		}
		else
		{
			// echo "lest go";

			if (mysqli_query($conn, "INSERT INTO `users` (`id`,`Name`, `Email`, `Phone`) VALUES (NULL,  '$name', '$email', '$phone')")) 
			{
				$output['status']  	= "200";
				$output['message']  = "Registraion Successfull";

			};
		}
	echo json_encode($output);

	} 
	else
	{
		$output = [];
		$output['status']  	= "403";
		$output['message']  = "You are not authrised to see this page"; 
	echo json_encode($output);
	}