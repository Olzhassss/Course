<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
require_once ($connection_config);

session_start();
// Block access for unathorized users
if (!isset($_SESSION['user_login'])) {
	header("Location:$authorizationPage_url");
}
// Terminate if required arguments are not passed
if (!isset($_POST['id'])) {
	exit("False");
}

try {
	// Common input for each form
	$_POST['name'] = is_valid(filtrateString( $_POST['name']),'^[A-Z]{1}[a-z]{0,19}$');
	$_POST['surname'] = is_valid(filtrateString( $_POST['surname']),'^[A-Z]{1}[a-z]{0,19}$');
	$_POST['sex'] = is_valid(filtrateString( $_POST['sex']),'^[A-Z]{1}[a-z]{3,6}$');
	$_POST['birth_year'] = is_valid(filtrateString( $_POST['birth_year']),'^([1][9][2-9]|[2][0,1][0-9])\d{1}$');
	$_POST['phone_number'] = filtrateString( $_POST['phone_number']);
	$_POST['email'] = is_valid(is_valid(filtrateString( $_POST['email']),
			'^[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$'),'^.{5,50}$');

	$_POST['ed_lvl'] = is_valid(filtrateString( $_POST['ed_lvl']),'^[A-Z]{1}[a-z]{0,24}$');
	$_POST['app_date'] = date('Y-m-d');


	// Check if a class already exists (by id)
	$stmt = $pdo->prepare("SELECT EXISTS( SELECT `id` FROM `appletree_personnel`.`classes` WHERE `id` = :id");
	$stmt->execute([':id' => $_POST['id']]);
	if ($stmt->fetchColumn()) // If exists
	{

		// Update the data
		$sql = 'UPDATE `appletree_personnel`.`classes` SET 
			id_teacher = :id_teacher,
			ed_lvl = :ed_lvl
			WHERE id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			':id_teacher' => $_POST['id_teacher'],
			':ed_lvl' => $_POST['ed_lvl']
		exit(0);
	}
	else // If does not exist
	{
		// Specific input from student application form
		$_POST['opt_checkbox1'] = is_valid(filtrateString( $_POST['opt_checkbox1']),'(^1$|^0$)');
		$_POST['opt_checkbox2'] = is_valid(filtrateString( $_POST['opt_checkbox2']),'(^1$|^0$)');
		$_POST['preferences'] = filtrateString( $_POST['preferences']);
		// Check if the string is too long
		if (strlen($_POST['preferences'])>700)
			throw new Exception('Please reload your page and fill the \'textarea\' field correctly.', 1);
		// Check if any applicant or stuff member  with same name and surname is recorded
		$sql_check1 = "SELECT EXISTS( SELECT id FROM appletree_personnel.app_students WHERE (name = :name AND surname = :surname))";
		$sql_check2 = "SELECT EXISTS( SELECT id FROM appletree_personnel.students WHERE (name = :name AND surname = :surname))";
		$stmt1 = $pdo->prepare($sql_check1);
		$stmt1->execute([':name' => $_POST['name'], ':surname' => $_POST['surname']]);
		$stmt2 = $pdo->prepare($sql_check2);
		$stmt2->execute([':name' => $_POST['name'], ':surname' => $_POST['surname']]);
		// Throw an expection if inqueries yield any result
		if ($stmt1->fetchColumn() || $stmt2->fetchColumn())
			throw new Exception("A person with such name and surname already applied/enrolled!", 1);

		// Insert the data
		$sql = 'INSERT INTO appletree_personnel.app_students
			(name, surname, sex, birth_year, phone_number, email, group_ls, ed_lvl, app_date, opt_checkbox1, opt_checkbox2, preferences)
			VALUES (:name, :surname, :sex, :birth_year, :phone_number, :email, :group_ls, :ed_lvl, :app_date, :opt_checkbox1, :opt_checkbox2, :preferences)';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			':name' => $_POST['name'],
			':surname' => $_POST['surname'],
			':sex' => $_POST['sex'],
			':birth_year' => $_POST['birth_year'],
			':phone_number' => $_POST['phone_number'],
			':email' => $_POST['email'],
			':group_ls' => $_POST['group_ls'],
			':ed_lvl' => $_POST['ed_lvl'],
			':app_date' => $_POST['app_date'],
			':opt_checkbox1' => $_POST['opt_checkbox1'],
			':opt_checkbox2' => $_POST['opt_checkbox2'],
			':preferences' => $_POST['preferences']]);
		exit(0);
	}
	else
		exit("False");
} catch (Exception $e) {
	exit($e->getMessage());
}

try{
	// Insert new record to a corresponding table
	if ($_POST['action'] == 'add') {
		// Fetch necessary applicant data
		$stmt = $pdo->prepare('SELECT * FROM '.$appTable.' WHERE `id` = :id');
		$stmt->execute([':id' => $_POST['id']]);
		$data_array = $stmt->fetch();
		$data_array['set_date'] = date('Y-m-d');
	
		// Insert the data
		if ($_POST['role'] == 'teachers'){
			$sql = 'INSERT INTO `appletree_personnel`.`teachers`
				(name, surname, sex, birth_year, phone_number, email, exp, ed_lvl, set_date, opt_radio1, opt_radio2, opt_radio3)
				VALUES (:name, :surname, :sex, :birth_year, :phone_number, :email, :exp, :ed_lvl, :set_date, :opt_radio1, :opt_radio2, :opt_radio3)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				':name' => $data_array['name'],
				':surname' => $data_array['surname'],
				':sex' => $data_array['sex'],
				':birth_year' => $data_array['birth_year'],
				':phone_number' => $data_array['phone_number'],
				':email' => $data_array['email'],
				':exp' => $data_array['exp'],
				':ed_lvl' => $data_array['ed_lvl'],
				':set_date' => $data_array['set_date'],
				':opt_radio1' => $data_array['opt_radio1'],
				':opt_radio2' => $data_array['opt_radio2'],
				':opt_radio3' => $data_array['opt_radio3']]);
		}
		if ($_POST['role'] == 'students'){
			$sql = 'INSERT INTO `appletree_personnel`.`students`
				(id_class, name, surname, sex, birth_year, phone_number, email, group_ls, ed_lvl, set_date, opt_checkbox1)
				VALUES (:id_class, :name, :surname, :sex, :birth_year, :phone_number, :email, :group_ls, :ed_lvl, :set_date, :opt_checkbox1)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
				':id_class' => $_POST['id_class'],
				':name' => $data_array['name'],
				':surname' => $data_array['surname'],
				':sex' => $data_array['sex'],
				':birth_year' => $data_array['birth_year'],
				':phone_number' => $data_array['phone_number'],
				':email' => $data_array['email'],
				':group_ls' => $data_array['group_ls'],
				':ed_lvl' => $data_array['ed_lvl'],
				':set_date' => $data_array['set_date'],
				':opt_checkbox1' => $data_array['opt_checkbox1']]);
		}
	}
	exit(0);
} catch(Exception $e) { exit ($e->getMessage()); }
// Normally the system should not reach this
exit("Unknown action initiated!");

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
		throw new Exception('Please reload your page and fill the fields correctly.', 1);
	else
		return $a_string;
}
?>