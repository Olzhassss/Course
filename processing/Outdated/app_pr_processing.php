<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
require_once ($connection_config);

// Assigning functions to avoid repeats. The functions filtrate input string via encoded fuctions
// and throw corresponting exceptions in case variable is undefined or empty string or does not match required regular expression.
function filtrateString($a_string){
	if (is_null($a_string) || !isset($a_string))
		throw new Exception("Some variables are undefined!", 1);
	else
		return htmlspecialchars(trim($a_string));
}
function is_empty($a_string){
	if($a_string =='')
		throw new Exception("Some neccessary fields are empty!", 1);
	else
		return $a_string;
}
function is_valid($a_string, $reg_ex){
	if (!preg_match("/".$reg_ex."/",$a_string))
		throw new Exception("Pattern mismatch (String: \'$a_string\'). Reload your page.", 1);
	else
		return $a_string;
}

try {
	$data['name'] = is_valid(is_empty(filtrateString( $_POST['name'])),"^[A-Z]{1}[a-z]{0,19}$");
	$data['surname'] = is_valid(is_empty(filtrateString( $_POST['surname'])),"^[A-Z]{1}[a-z]{0,19}$");
	$data['phone_number'] = is_empty(filtrateString( $_POST['phone_number']));
	$data['email'] = is_valid(is_valid(is_empty(filtrateString( $_POST['email'])),
			"^[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$"),".{5,50}");
	$data['ed_lvl'] = is_valid(is_empty(filtrateString( $_POST['ed_lvl'])),"^[A-Z]{1}[a-z]{0,24}$");
	$data['birth_year'] = is_valid(is_empty(filtrateString( $_POST['birth_year'])),"^[0-9]{0,24}$");
	$data['preferences'] = is_valid(filtrateString( $_POST['preferences']), ".{0,500}");
	$data['app_date'] = date("Y-m-d");
	$data['gender'] = is_valid(filtrateString( $_POST['gender']),"^[A-Z]{1}[a-z]{3,6}$");
	$data['opt_radio1'] = is_valid(filtrateString( $_POST['opt_radio1']),"(^1$|^0$)");
	$data['opt_radio2'] = is_valid(filtrateString( $_POST['opt_radio2']),"(^1$|^0$)");
} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}

try {
	// Check if applicant with the given name and surname exists
	$sql = "SELECT EXISTS( SELECT id FROM appletree_personnel.app_students WHERE (name = :name AND surname = :surname))";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':name' => $data['name'], ':surname' => $data['surname'] ]);

	// if inquery yielded any result
	if($stmt->fetchColumn())
	{
		exit("This person has already applied!");
	} else
	{
		// Check if applicant or stuff member with similar phone number or email is recorded
		$sql = "SELECT EXISTS( SELECT id FROM appletree_personnel.app_students WHERE (email = :email OR phone_number = :phone_number))";
		$stmt1 = $pdo->prepare($sql);
		$stmt1->execute([':email' => $data['email'], ':phone_number' => $data['phone_number'] ]);
		$sql = "SELECT EXISTS( SELECT id FROM appletree_personnel.students WHERE (email = :email OR phone_number = :phone_number))";
		$stmt2 = $pdo->prepare($sql);
		$stmt2->execute([':email' => $data['email'], ':phone_number' => $data['phone_number'] ]);
		// if inquery yielded any result
		if ($stmt1->fetchColumn() || $stmt2->fetchColumn()) {
			exit("Phone number or email is already occupied!");
		}
		else
		{
			$sql = "INSERT INTO appletree_personnel.app_students
				(name, surname, app_date, phone_number, email, ed_lvl, exp, gender, summary, opt_radio1, opt_radio2, opt_radio3)
				VALUES (:name, :surname, :app_date, :phone_number, :email, :ed_lvl, :exp, :gender, :summary, :opt_radio1, :opt_radio2, :opt_radio3)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':name' => $data['name'], ':surname' => $data['surname'], ':app_date' => $data['app_date'],
				':phone_number' => $data['phone_number'], ':email' => $data['email'], ':ed_lvl' => $data['ed_lvl'],
				':exp' => $data['exp'], ':gender' => $data['gender'], ':summary' => $data['summary'],
				':opt_radio1' => $data['opt_radio1'], ':opt_radio2' => $data['opt_radio2'], ':opt_radio3' => $data['opt_radio3']]);
			exit(0);
		}
	}
} catch(Exception $e) {
	echo $e->getMessage();
	exit ('Error occured! Please contact administrator. Failed to manipulate the databases.');
}
	
?>