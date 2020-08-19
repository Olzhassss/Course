<?php
$temp = "..";
require_once('../root.php');

require_once ($connection_config);

$login = trim( $_POST['login']);
$password = trim( $_POST['password']);

$output = -1;

if (!empty($login) && !empty($password))
{
	$sql = "SELECT login, pswd FROM $db_name . admins WHERE login = :login";
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
			$output = 0;
			//header('Location:admin.php');
		} else
		{
			// This execution status means that the password does not correspond to the login
			$output = 1;
		}
	} else
	{
		// This execution status means that query did not get any result, i.e. no record with such login
		$output = 2;
	}
}
else
{
	// This execution status means that one or both variables were empty strings
	$output = 3;
}

echo $output;

?>