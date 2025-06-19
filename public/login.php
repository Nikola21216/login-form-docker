<?php
session_start();

$servername = getenv('DB_HOST') ?: "db:3307";
$db_username = getenv('DB_USER') ?: "root";
$db_password = getenv('DB_PASS') ?: "1234";
$database = getenv('DB_NAME') ?: "login_form";

try {
	$connection = new PDO("mysql:host=$servername;dbname=$database", $db_username, $db_password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
	die(); // спира изпълнението при грешка с базата
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	$stmt->execute([$username, $password]);
	$user = $stmt->fetch();

	if ($user) {
		$_SESSION['user'] = $user;
		header("location: admin.php");
		exit;
	} else {
		echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";
	}
}
?>

<html>

<head>
	<title>Login</title>
</head>

<body>
	<form method="post">
		<label>Потребителско име:</label><br>
		<input type="text" name="username" required><br><br>
		<label>Парола:</label><br>
		<input type="password" name="password" required><br><br>
		<input type="submit" name="submit" value="Вход">
	</form>
</body>

</html>

