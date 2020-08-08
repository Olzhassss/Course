<?php
	//Variables required for mysqli
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appletree";
	
	// Create connection
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$connection)
	{
	    echo "Ошибка: Невозможно установить соединение с MySQL."  .PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno()  .PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error()  . PHP_EOL;
	    exit;
	}  
	echo "Соединение с MySQL установлено!" . PHP_EOL;
	echo "Информация о сервере: " . mysqli_get_host_info($connection) . PHP_EOL;


	//Write query
	$query="SELECT * from articles";

	//Fetch results
	$result=mysqli_query($connection, $query);

	//Display results
	while($row=mysqli_fetch_array($result))
	{
		echo $row . PHP_EOL;
	//use row to fetch the element of each column
	}

	//close connection
	mysqli_close($connection);
?>