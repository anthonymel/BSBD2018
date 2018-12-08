<html>
	<head>
	<title>Добавление</title>
	<meta content="text/html;"/>
	</head>
	<body>
	<?php
	$link = mysqli_connect('localhost', 'admin', '123', 'pharma');
	mysqli_set_charset($link, "utf-8");
			// Построение SQL-оператора
		$name = mysqli_real_escape_string($link, $_POST['Name']);
		$type = mysqli_real_escape_string($link, $_POST['Type']);
		$price = mysqli_real_escape_string($link, $_POST['Price']); 
		$maker = mysqli_real_escape_string($link, $_POST['Maker_id']); 
		$count = mysqli_real_escape_string($link, $_POST['Count']);
		$storage = mysqli_real_escape_string($link, $_POST['Storage']); 
		$dose = mysqli_real_escape_string($link, $_POST['Dose']); 
		$result = mysqli_query($link, "INSERT INTO prep VALUES (DEFAULT, '$name', '$type', '$maker', '$dose', '$storage')");
		$max = mysqli_query($link, "SELECT max(prep_id) from prep;");
		$row = mysqli_fetch_row($max);
		$result2 = mysqli_query($link, "INSERT INTO arrival VALUES(DEFAULT, '$row[0]', CURRENT_TIMESTAMP, '$count', '$price')");
	if ($result=='TRUE')
	{
	echo "отправлен!";
	}

	else {
	echo "Ошибка!не отправлен";
	}

	?>

	<br><a href='login.php'>Обратно в личный кабинет</a>
	</body>
	</html>