<?php
	include('.env.php');
	$host = getenv('DB_HOST');
	$db = getenv('DB');
	$password = getenv('DB_PASS');
	$user = getenv('DB_USER');
	//Databse Connection
	try{
		//$conn = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB'));
		$pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
		//set the PDO error mode to exception
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//print host information
		//echo "Connect Successfully. Host info: "  .$pdo -> getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	} catch(PDOException $e){
		die("ERROR: Could not connect. " . $e -> getMessage());
	}
?>
