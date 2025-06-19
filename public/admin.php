<?php
session_start();

if ( !$_SESSION['user'] ) {
	
	// ако няма логнат потребител се прави пренасочване към login.php
	
	header("location: login.php");
	exit;
}

?>

<html>
<head></head>
<body>

	<br>Тази страница е защитена и само регистрирани потребители имат достъп до нея!

</body>
</html>
