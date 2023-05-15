
<!DOCTYPE html>
<html>

<head>
	<title>Simple PHP Form</title>
</head>

<body>
	<h1>Simple PHP Form</h1>
	<form method="post" action="">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone"><br><br>
		<label for="message">Message:</label><br>
		<textarea name="message" id="message" rows="5" cols="30" required></textarea><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
	if (isset($_POST['submit'])) {
		$to = "dejwatest2@gmail.com";
		$subject = "New form submission";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$headers = "From: $email \r\n";
		$headers .= "Reply-To: $email \r\n";

		mail($to, $subject, "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message", $headers);
		echo "<p>Thank you for your message!</p>";
	}
	?>
</body>

</html>