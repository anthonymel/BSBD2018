<html>
	<head>
	<title>Отправка заказа</title>
	<meta content="text/html;"/>
	</head>
	<body>
	<?php
	$link = mysqli_connect('localhost', 'root', '123', 'pharma');
	mysqli_set_charset($link, "utf-8");
			// Построение SQL-оператора
		$name = $_POST['Name'];
		$type = $_POST['Type'];
		$price = $_POST['Price']; 
		$maker = $_POST['Maker_id']; 
		$count = $_POST['Count'];
		$storage = $_POST['Storage']; 
		$dose = $_POST['Dose']; 
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