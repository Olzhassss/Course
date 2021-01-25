<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
require_once ($connection_config);

session_start();
// Block access for unathorized users
if (!isset($_SESSION['user_login'])) {
	header("Location:$authorizationPage_url");
}
// Terminate if the required arguments are not passed
if (!isset($_POST['id'])) {
	exit("False");
}



try {
	if ($_POST['action']=='delete') {
		$stmt = $pdo->prepare('DELETE FROM `appletree_personnel`.`classes` WHERE `id` = :id');
		$stmt->execute([':id' => $_POST['id']]);
		exit (0);
	} elseif ($_POST['action']=='update') {
		// Formatting the class id
		$_POST['id'] = is_valid(filtrateString( $_POST['id']),'^([GP]R|SP)[A-Z]-[0-9].{0,14}$');
		// Check if the class already exists (by id)
		$stmt = $pdo->prepare("SELECT EXISTS( SELECT `id` FROM `appletree_personnel`.`classes` WHERE `id` = :id )");
		$stmt->execute([':id' => $_POST['id']]);
		if ($stmt->fetchColumn()) // If the class exists
		{	
			// If it has to be a new record (new class)
			if ($_POST['previous_id']!=-1) {
				exit('This class already exists! Please, choose other or change its name first.');
			}
			// Update the data
			$sql = 'UPDATE `appletree_personnel`.`classes` SET 
				`id_teacher` = :id_teacher,
				`ed_lvl` = :ed_lvl,
				`std_num` = :std_num
				WHERE `id` = :id';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				':id' => $_POST['id'],
				':id_teacher' => $_POST['id_teacher'],
				':ed_lvl' => $_POST['ed_lvl'],
				':std_num' => $_POST['std_num']]);
		}
		else // If the class does not exist
		{
			// Insert the data
			$sql = 'INSERT INTO `appletree_personnel`.`classes`(`id`,`id_teacher`,`ed_lvl`,`std_num`)
					VALUES (:id, :id_teacher, :ed_lvl, :std_num)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				':id' => $_POST['id'],
				':id_teacher' => $_POST['id_teacher'],
				':ed_lvl' => $_POST['ed_lvl'],
				':std_num' => $_POST['std_num']]);
			// Delete the previous record if it exists ('previous_id' should not be -1 otherwise)
			// and the class ID (name) has changed
			if ($_POST['previous_id']!=-1 && $_POST['previous_id']!=$_POST['id']) {
				$stmt = $pdo->prepare('DELETE FROM `appletree_personnel`.`classes` WHERE `id` = :id');
				$stmt->execute([':id' => $_POST['previous_id']]);
			}
		}
		exit(0);
	} else { exit('Unknown action initiated!'); }
} catch (Exception $e) {
	exit($e->getMessage());
}

// The functions below are used to filtrate input strings via encoded fuctions
// and throw corresponting exceptions in case variable is undefined or empty string or does not match required regular expression.
function filtrateString($a_string){
	if (is_null($a_string) || !isset($a_string))
		throw new Exception('Some variables are undefined or null!', 1);
	else
		return htmlspecialchars(trim($a_string));
}
function is_valid($a_string, $reg_ex){
	if (!preg_match('/'.$reg_ex.'/',$a_string))
		throw new Exception('Invalid class name!', 1);
	else
		return $a_string;
}
?>