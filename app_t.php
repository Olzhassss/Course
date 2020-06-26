<!-- BEGINNING OF THE FILE, PHP -->
<?php
//Importing necessary file of connection to the database
include_once('connect.php');

// Form processing, this inserts applied teacher's data into 'teachers' table inside the database
// and returns alert depending on result of SQL query;
// redirects to the main page if successful
if(isset($_POST["submit_button"]))
{
	// СДЕЛАТЬ ОТДЕЛЬНЫЙ КЛАСС ИЛИ МАССИВ ВМЕСТО КУЧИ ПЕРЕМЕННЫХ
	// Declairing variables for further usage (data from posted form)
	$Username = $_POST["name_field"];	// This variable saves applicant's entered name
	$Surname = $_POST["surname_field"]; // This variable saves applicant's entered Surname
	$PhoneNumber = $_POST["ph_number_field"]; // This variable saves applicant's entered Phone number (not being used yet)
	$Email = $_POST["email_field"];	// This variable saves applicant's entered email
	$LevelEd = $_POST["ed_level_field"]; // This variable saves applicant's entered level of teaching/learning
	$WorkExperience = $_POST["exp_field"]; // This variable saves applicant's entered work experience
	// Accessing current data to insert into table and saving in variable
	$Date = date("Y-m-d");
	
	if($_POST["Role"]== "Teacher")
	{
		// Creating SQL query to access 'teachers' table
		$sql_query = "INSERT INTO `teachers`(`name`, `surname`, `set_date`, `email`,`exp`) VALUES ('$Username', '$Surname','$Date', '$WorkExperience')";
	} else{
		$sql_query = "INSERT INTO `students`(`name`, `surname`, `set_date`, `email`) VALUES ('$Username','$Surname','$Date')";
	}
	
	$result = mysqli_query($connection, $sql_query);
	// Analyzing returned value - successful or not (true or false) and calling alert
	if($result == 'TRUE')
	{
		echo "<script>alert('Ваша заявка принята!')</script>";
		mysqli_close($connection);
		echo "<script>window.location = 'http://sau2/main.php'</script>";
	}
	else
	{
		echo "<script>alert('Error!')</script>"; 
		mysqli_close($connection);
		echo "<script>window.reload()</script>";
	}
}
// Importing the header
include_once('header.php');
?>
<!-- END OF PHP -->
<!-- BEGINNING OF HTML -->
<head>
	<!--importing styles from foreign file-->
	<link rel="stylesheet" href="stylesheets/client.style.css">
</head>

<div class="container main" >
	<span>
		<p>
			Сегодня каждый, кто стремится попасть в мир интеллектуальных людей, задается вопросом — как выучить английский язык? Все ищут универсальный ответ, который предопределит головокружительную карьеру. Да, до изобретения интернета и появления мобильных платформ можно было освоить язык по учебникам и DVD, сдать государственный экзамен и идти работать. Сегодня реалии таковы, что всем выпускникам из ВУЗ-а предъявляется огромный список требований, среди которых — хорошее знание анлийского языка.
		</p>
	</span>
	<br></br>
	<div class="form-wrapper pl-3 pt-3 pb-3 pr-3">
		<!-- Creating and filling teacher application form -->
		<form method="post" action="?">
			<h2>For new applicants!</h2>
			<p>Role:
				<select name="Role" class="mt-3">
					<option>Teacher</option>
					<option>Student</option>
				</select>
				<input type="submit" name="submit_button" value="Submit!" class="mt-3" style="width:30%">
			</p>
			<br>
			<p>Name:
				<input type="text" name="name_field" required="true" placeholder="Enter your name here" pattern="[a-z]{3-20}">
			</p>
			<div class="teacher_wrapper">
				<p>Surname:
					<input type="text" pattern="[a-z]{3-20}" name="surname_field" required="true"placeholder="Enter your surname here">
				</p>
				<p>Phone number (10 integer digits without '+7' or '8'): 
					<input type="text" name="ph_number_field" required="true" pattern="/d{10}" placeholder="Enter your phone number">
				</p>
				<p>Email:
					<input type="text" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" name="email_field" required="true"placeholder="Enter your email here">
				</p>
				<p>Working experience:
					<input type="text" pattern="[0-9]{1-2}" name="exp_field" required="true"placeholder="Enter your work experience (years) here">
				</p>	
			</div>
 		</form>
 	</div>
</div>
<!-- Including footer -->
<?php include_once('footer.php');?>
<!-- END OF FILE -->