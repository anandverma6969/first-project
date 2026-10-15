<?php

include "db.php";

$message = "";

if(isset($_POST["save_btn"])){
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$course = trim($_POST["course"]);
$phone = trim($_POST["phone"]);
$city = trim($_POST["city"]);

if(empty($name)||empty($email)||empty($course)) {
	$message = "Name,emial and course are required";
}else{
	$name = mysqli_real_escape_string($conn,$name);
	$email = mysqli_real_escape_string($conn,$email);
	$course = mysqli_real_escape_string($conn,$course);
	$phone = mysqli_real_escape_string($conn,$phone);
	$city = mysqli_real_escape_string($conn,$city);

	$sql = "INSERT INTO students(name,email,course,phone,city)
		VALUES('$name','$email','$course','$phone','$city')";

	if(mysqli_query($conn,$sql)) {
		$message = "Students added successfuliiy";
	}else{
		$message = "Error: ".mysqli_error($conn);
		}
	}
}
?>
<html>
<body>

<p><?php echo htmlspecialchars($message);?></p>
<form method=post>
<input type="test" name="name" placeholder="Enter name"><br><br>
<input type="text" name="email" placeholder="Enter email"><br><br>
<input type="text" name="course" placeholder="Enter Course"><br><br>
<input type="text" name="phone" placeholder="Enter Phone"><br><br>
<input type="text" name="city" placeholder="Enter city"><br><br>
<button type="submit" name="save_btn">Save Student</button>

</form>


</body>
</html>