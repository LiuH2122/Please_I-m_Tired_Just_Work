<?php

	include 'connection.php';
	$fname = $_POST['first-name'];
	$lname = $_POST['last-name'];
	$email = $_POST['email'];

	$sql = "INSERT INTO `members` (`id`, `fname`, `lname`, `gmail`, `hours`) VALUES ('', '$fname', '$lname', '$email', '');";
	mysqli_select_db($conn,"key-club-database");

	if(!$conn->query($sql)){
		echo 'Whatever you tried to do did not work. Dont bother trying again - if it didnt work the first time it probably will not work again' . mysqli_error($conn);

	}
	else{
		echo 'Member', $fname, ' ', $lname, ' has been added! ', 'Email: ', $email;
	}
?>
<br>
<a style = "color:#3E3E3E"href = "admin.php">
        Go back
</a>