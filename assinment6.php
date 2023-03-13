
<form method="post" action="submit.php" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>

  <label for="profile_picture">Profile Picture:</label>
  <input type="file" id="profile_picture" name="profile_picture" required><br><br>

  <input type="submit" value="Submit">
</form>


<?php
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($name) || empty($email) || empty($password)) {
  die("All fields are required");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email format");
}


$uploads_dir = 'uploads/';
$file_name = uniqid() . '_' . $_FILES['profile_picture']['name'];
$file_path = $uploads_dir . $file_name;

if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file_path)) {
  die("Failed to save file");
}


$file = fopen("users.csv", "a");

if (!$file) {
  die("Failed to open file");
}

$data = array(
  $name,
  $email,
  $file_name
);

fputcsv($file, $data);
fclose($file);


setcookie("username", $name);

header("Location: thank-you.html");
exit();
?>

<!-- HTML page to display contents of "users.csv" file: -->

<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile Picture</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $file = fopen("users.csv", "r");

        if (!$file) {
          die("Failed to open file");
        }

        while (($data = fgetcsv($file)) !== FALSE) {
          echo "<tr>";
          echo "<td>" . $data[0] . "</td>";
          echo "<td>" . $data[1] . "</td>";
          echo "<td><img src='uploads/" . $data[2] . "' width='100'></td>";
          echo "</tr>";
        }

        fclose($file);
      ?>
    </tbody>
  </table>
</body>
</html>
