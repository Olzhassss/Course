<?php
	//Variables required for mysqli
	$driver = 'mysql';
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'appletree';
	$charset = 'utf8';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


	try {
		$pdo = new PDO("$driver:host = $host; dbname = $db_name; charset = $charset", $username, $password, $options);

		
		
	} catch (PDOException $e) {
		exit(" Access to database failed! ");
	}

	session_start();
	/*
	//Fetch results
	$result=$pdo->query('SELECT * FROM admins');

	//Display results
	while($row=$result->fetch(PDO::FETCH_ASSOC))
	{
		echo $row . PHP_EOL;
	//use row to fetch the element of each column
	}

	$sql = "SELECT name FROM $db_name . teachers WHERE set_date = :set_date";
	$stmt = $pdo->prepare($sql);

	$params = [':set_date' => '2020-04-12'];
	$stmt->execute($params);

	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//echo "<pre>";
	//var_dump($rows);
	*/
?>