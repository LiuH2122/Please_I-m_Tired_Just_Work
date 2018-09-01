<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$eventNumber = $_POST['enumber'];
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$code = $_POST['code'];
		include 'connection.php';
		$userExists = false;
		$success = false;
		$errorMessage = "";
		mysqli_select_db($conn, 'keyclubdatabase');

		$sqlQuery = "SELECT COUNT(id) FROM `members` WHERE fname = '$firstName' AND lname = '$lastName' AND code = '$code';";

		if($result = $conn->query($sqlQuery)){
			$count = $result -> fetch_assoc();
			$count= $count['COUNT(id)'];
			$userExists = ($count > 0 ? true : false);

		}


		if($userExists){
			$sqlQuery = "SELECT * FROM `members` WHERE fname = '$firstName' AND lname = '$lastName' AND code = '$code';";
			$result = $conn -> query($sqlQuery);
			$row = $result -> fetch_assoc();
			$email = $row["gmail"];
			
			$sqlQuery = "SELECT * FROM `events` WHERE id = $eventNumber;";



			if($result = $conn -> query($sqlQuery)){
				$row = $result->fetch_assoc();
				$eventName = $row['Event'];
			}
			else{
				echo "You dungoofed";
				echo $conn->error;
				$success = false;

			}

			$eventName = preg_replace('/\s*/', '', $eventName);
			// convert the string to all lowercase
			$eventName = strtolower($eventName);

			mysqli_select_db($conn, 'events');

			$sqlQuery = "SELECT * FROM `$eventName`";

			if($conn->query($sqlQuery)){
				$sqlQuery = "INSERT INTO `$eventName` (`id`, `fname`, `lname`) VALUES (NULL, '$firstName', '$lastName');";

				if($conn->query($sqlQuery)){

						$errorMessage = "Sign up successful!";

						echo $errorMessage;
						$formcontent= "
<html>
<head>
</head>
<body>
<div style='font-size:15px;'>
Hi, $firstName $lastName
<br />
<br />

We're emailing you to let you know that you signed up for the following key club event: $eventName.

<br />
<br />

If you did not initiate this request, please tell us so that we can change your member code to prevent this from happening again.

<br />
<br />

Best regards,

<br />

Millennium High School Key Club.
</div>
</body>
</html>
";
							$mailheader = "MIME-Version: 1.0" . "\r\n";
							$mailheader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$recipient = "$email";
							$subject = "Key Club event sign up";
							mail($recipient, $subject, $formcontent, $mailheader) or die("Error! Try again later.");

					
				}

				else{
					$errorMessage = "Something went wrong on our end! Please try again later.";

						echo $errorMessage;

					echo $conn -> error;

				}

			}
			else {
				$sqlQuery = "CREATE TABLE `events`.`$eventName` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(255) NOT NULL , `lname` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

				if($conn->query($sqlQuery)){

					$sqlQuery = "INSERT INTO `$eventName` (`id`, `fname`, `lname`) VALUES (NULL, '$firstName', '$lastName');";

					if($conn->query($sqlQuery)){
						$errorMessage = "Sign up successful!";
						echo $errorMessage;
						$formcontent= "
<html>
<head>
</head>
<body>
<div style='font-size:15px;'>
Hi, $firstName $lastName
<br />
<br />

We're emailing you to let you know that you signed up for the following key club event: $eventName.

<br />
<br />

If you did not initiate this request, please tell us so that we can change your member code to prevent this from happening again.

<br />
<br />

Best regards,

<br />

Millennium High School Key Club.
</div>
</body>
</html>
";
							$mailheader = "MIME-Version: 1.0" . "\r\n";
							$mailheader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$recipient = "$email";
							$subject = "Key Club event sign up";
							mail($recipient, $subject, $formcontent, $mailheader) or die("Error! Try again later.");

					}
							
				
					else{
					$errorMessage = "Something went wrong on our end! Please try again later.";
					echo $errorMessage;
					echo $conn -> error;

					}

				}
				else{
					$errorMessage = "We could not find an event corresponding to the event number!";
					echo $errorMessage;

				}

			}
		}

		else {
			$errorMessage = "We could not find you in our database. Make sure you have requested entry and that everything is spelt right.";
			echo $errorMessage;
			echo "<br />".$conn->error;
		}
		$conn->close();
		echo "<a style = 'color:#3E3E3E'href = 'events.php'>
        Go back
</a>";
	}

?>
