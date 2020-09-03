<?php 

require_once 'connection_config.php';

// Assigning function to avoid repeat. The function filtrates input string via encoded fuctions
function filtrateString($a_string)
{
	return mysql_escape_string(htmlspecialchars(trim($a_string)));
}

$login = filtrateString( $_POST['name']);
$pass = filtrateString( $_POST['password']);

if (!empty($login) && ! empty($pass)) {
	
	$sql_check = "SELECT EXISTS( SELECT login FROM $db_name . admins WHERE login = :login)";
	$stmt = $pdo->prepare($sql_check);
	$stmt->execute([':login' => $login]);

	if( $stmt->fetchColumn())
	{
		exit('Login is occupied! Try another one.');
	}
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	$sql = "INSERT INTO $db_name .admins (login, pswd) VALUES (:login, :pswd)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':login' => $login, ':pswd' => $pass ]);

	echo "Registration is successful!";
}
else
	exit('Fill the spaces!')
?>