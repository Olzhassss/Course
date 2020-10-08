<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 

require_once ($connection_config);

// Assigning functions to avoid repeats. The functions filtrates input string via encoded fuctions and throw corresponting exceptions in case variable is undefined or empty string.
function filtrateString($a_string)
{
	if (is_null($a_string) || !isset($a_string))
		throw new Exception("Some variables are undefined!", 1);
	else
		return htmlspecialchars(trim($a_string));
}
function is_empty($a_string)
{
	if($a_string =='')
		throw new Exception("Some neccessary fields are empty!", 1);
	else
		return $a_string;
}
try {
	$name = is_empty(filtrateString( $_POST['name']));
	$surname = is_empty(filtrateString( $_POST['surname']));
	$phone_number = is_empty(filtrateString( $_POST['phone_number']));
	$email = is_empty(filtrateString( $_POST['email']));
	$ed_lvl = is_empty(filtrateString( $_POST['ed_lvl']));
	$exp = is_empty(filtrateString( $_POST['exp']));
	$summary = filtrateString( $_POST['summary']);
	$app_date = date("Y-m-d");
} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}
if (false) {
	
	$sql_check = "SELECT EXISTS( SELECT login FROM appletree_personnel.admins WHERE login = :login)";
	$stmt = $pdo->prepare($sql_check);
	$stmt->execute([':login' => $login]);

	if( $stmt->fetchColumn())
	{
		exit('Login is occupied! Try another one.');
	}
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT INTO appletree_personnel.admins (login, pswd) VALUES (:login, :pswd)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':login' => $login, ':pswd' => $password ]);

	echo "Registration is successful!";
}
/*
	$sql = "SELECT EXISTS( SELECT login FROM appletree_personnel.admins WHERE (name = :name AND surname = :surname) OR )";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':login' => $login]);
	$user = $stmt->fetch(PDO::FETCH_OBJ);
	if($user)
	{
		if (password_verify($password, $user->pswd))
		{
			session_start();
			$_SESSION['user_login'] = $user->login;
			// This execution status means that the password corresponds to the login
			echo 0;
		} else
		{
			// This execution status means that the password does not correspond to the login
			echo 1;
		}
	} else
	{
		// This execution status means that query did not get any result, i.e. no record with such login
		echo 2;
	}*/
?>