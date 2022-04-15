<?php
session_start(); 
include "../Database/Database.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

			$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

			$result = mysqli_query($conn, $sql);
			
	
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
					$_SESSION['id'] = $row["id"];
					$_SESSION['name'] = $row["name"];
					header("Location: ../View/Home.php");
					exit();
			}else{
				header("Location: ../View/Login.html");
				
				exit();
			}	

	
}else{
	header("Location: ../View/Login.html");
	exit();
}


?>