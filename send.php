<?php
	
	if(isset($_POST['btnSubmit'])) {
		require_once('connect.php');
		$name = $_POST['userName'];
		$email = $_POST['userEmail'];
		$subject = $_POST['userSubject'];
		$messege = $_POST['userMessege'];

		$name = mysqli_real_escape_string($conn, $name);
		$email = mysqli_real_escape_string($conn, $email);
		$subject = mysqli_real_escape_string($conn, $subject);
		$messege = mysqli_real_escape_string($conn, $messege);

		date_default_timezone_set('Asia/Seoul');
		$dateofsubmit = date('m/d/Y h:i:s a', time());

		$sql = "INSERT INTO feedback (name, email, subject, messege, dateofsubmit) VALUES ('$name', '$email', '$subject', '$messege', '$dateofsubmit')";

		if (mysqli_query($conn, $sql)) {
			echo 'Your feedback has been send successfully! <a href="index.html">Go back</a>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}

?>