<html>
	<head>
	<title>Изменение</title>
	<meta content="text/html;"/>
	</head>
	<body>
	<?php
	$link = mysqli_connect('localhost', 'root', '123', 'pharma');
	mysqli_set_charset($link, "utf-8");
			// Построение SQL-оператора
		$id = $_POST['ID'];
		$name = $_POST['Name'];
		$type = $_POST['Type'];
		$price = $_POST['Price']; 
		$maker = $_POST['Maker_id']; 
		$count = $_POST['Count'];
		$storage = $_POST['Storage']; 
		$dose = $_POST['Dose']; 
		$result = mysqli_query($link, "UPDATE prep SET prep_name = '$name', prep_type = '$type', maker_id = '$maker', dose_id = '$dose', storage_id='$storage' where prep_id = '$id'");
	//	$max = mysqli_query($link, "SELECT max(prep_id) from prep;");
	//	$row = mysqli_fetch_row($max);
		$result2 = mysqli_query($link, "UPDATE arrival SET arrival_count = '$count', arrival_amount = '$price' where prep_id = '$id'");
	if ($result=='TRUE' AND $result2=='TRUE')
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