<html>
	<head>
	<title>Удаление препарата</title>
	<meta content="text/html;"/>
	</head>
	<body>
	<?php
	$link = mysqli_connect('localhost', 'root', '123', 'pharma');
	mysqli_set_charset($link, "utf-8");
	$prep = $_POST['prep'];

	  $query = "DELETE FROM prep WHERE prep_name = '$prep'";
	  mysqli_query($link, $query)
		or die('Error querying database.');

	  echo 'Prep removed: ' . $prep;

	  mysqli_close($link);
	?>

	<br><a href='login.php'>Вернуться в личный кабинет</a>
	</body>
	</html>