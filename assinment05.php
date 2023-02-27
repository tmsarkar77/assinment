
<!-- Task 1: HTML Basics


Create an HTML form that allows users to input their name and email address. The form should have two fields: one for name and one for email. Use appropriate HTML tags to structure the form. -->

<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
</head>
<body>
	<h1>Contact Form</h1>
	<form action="#" method="post">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

<!-- Task 2: Basic OOP in PHP -->

<?php

class Person {
    private $name;
    private $email;

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

$person = new Person();

$person->setName("Sagor Sarkar");
$person->setEmail("sagor@gmail.com");

echo "Name: " . $person->getName() . "\n";
echo "Email: " . $person->getEmail() . "\n";
?>



// Task 3: Superglobal Variables in PHP

<?php



include 'Person.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = $_POST['name'];
    $email = $_POST['email'];

    
    $person = new Person();

   
    $person->setName($name);
    $person->setEmail($email);

    
    echo "Name: " . $person->getName() . "<br>";
    echo "Email: " . $person->getEmail() . "<br>";
}

?>

