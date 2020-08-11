<?php
require_once 'connection_config.php';

$login = trim( $_GET['name']);
$pass = trim( $_GET['password']);

if (!empty($login) && ! empty($pass)) {
	
	$sql = "SELECT login, pswd FROM $db_name . admins WHERE login = :login";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':login' => $login]);

	$user = $stmt->fetch(PDO::FETCH_OBJ);
	if($user)
	{
		if (password_verify($pass, $user->pswd))
		{
			$_SESSION['user_login'] = $user->login;
			header('Location:admin.php');
		} else
		{
			echo "Wrong login or password";
		}
	} else
	{
		echo "No such user.";
	}

}
else
	exit('Fill the spaces!');
?>