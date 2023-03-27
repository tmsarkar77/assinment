//---A registration form----

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form action="register.php" method="post">
		<label for="first_name">First Name:</label>
		<input type="text" name="first_name" required>
		<br>
		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" required>
		<br>
		<label for="email">Email Address:</label>
		<input type="email" name="email" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" required>
		<br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" required>
		<br>
		<input type="submit" value="Register">
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];

			// Validation
			if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
				echo "All fields are required.";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email format.";
			} elseif ($password != $confirm_password) {
				echo "Passwords do not match.";
			} else {
				echo "Registration successful!";
				// Save user data to database or perform other actions here
			}
		}
	?>
</body>
</html>

//----- a login form ------

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>
	<form action="welcome.php" method="post">
		<label for="email">Email Address:</label>
		<input type="email" name="email" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" required>
		<br>
		<input type="submit" value="Login">
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_POST['email'];
			$password = $_POST['password'];

			// Validation
			if (empty($email) || empty($password)) {
				echo "Both fields are required.";
			} else {
				// Check user credentials against database or other data source
				// If credentials are valid, redirect to welcome page
				// If not, display error message
				// For this example, we'll assume the credentials are valid and redirect to welcome.php
				header("Location: welcome.php?email=$email");
				exit();
			}
		}
	?>
</body>
</html>


//--Dashboard page---

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
    
	<h1>Welcome Sagor Sarkar</h1>

</body>
</html>