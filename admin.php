<?php
include ("bd.php");
// вся процедура работает на сесиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
include ("cookies.php");
if (empty($loginresult) or (!$admin)) {
	exit("<br><a href='login.php'>Авторизация</a><br> Недостаточно прав для просмотра данной страницы!");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>БелФармация</title>
                <meta http-equiv ="Content-Type" content="text/html; charset=UTF-8">
                     <link rel="stylesheet" href="/css/reset.css">
                 <link rel="stylesheet" href="/css/news1.css">
                     <script type="text/javascript" src="/js/snow.js"></script>
                     <script type="text/javascript" src="/js/1.js"></script>

	</head>
	<body>
		<section>
			<header style="background-image: url(../img/3511130028.jpg)">
                             
                                <h1>Аптечный склад РУП "БелФармация" </h1>
			</header>
                    <!-- Верхнее меню сайта -->
        <div id="menu-top">
        <div class="bg-1">
            <ul>
            <li><a href="prep.php">АССОРТИМЕНТ</a></li>
            <li><a href="arrive.php">ПРОИЗВОДИТЕЛИ</a></li>
            <li><a href="login.php">АВТОРИЗАЦИЯ</a></li>
            <li><a href="index.php">ГЛАВНАЯ</a></li>
			<li><a href="new.php">ПОСТУПЛЕНИЯ</a></li>
            </ul>
        </div>
        <div class="bg-2"></div>
        </div>
			<center style="background-image: url(../img/blue-background.jpg)">
				<page>
                                    <marquee class="style-marquee" direction="left" behavior="scroll" scrollamount="12" >РУП "БелФармация" находится в г.Йошкар-ола ул.Строителей 58 телефон 8(987)-456-32-45</marquee>
                                    
                                    </page>
				<news>
                                   <div>
	 </head>
	 <body>
	<details>
   <summary>Информация о препаратах</summary>
   <p>
   <?php
	 include ("bd.php");    
	$query ="SELECT prep_id, prep_name, prep_type FROM prep";
 	$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
	if($result)
	{
		$rows = mysqli_num_rows($result); // количество полученных строк
		 
		echo "<table border='10' bordercolor='black'><tr><th><b>| ID </b></th><th><b>| Название перпарата |</b></th><th><b> Тип препарата |</b></th></tr>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
		}
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}?>
	</p>
	</details>
	<details>
	   <summary>Информация о производителях</summary>
   <p>
   <?php
	 include ("bd.php");    
	$query ="SELECT maker_id, maker_name, maker_adress FROM maker";
 	$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
	if($result)
	{
		$rows = mysqli_num_rows($result); // количество полученных строк
		 
		echo "<table border='10' bordercolor='black'><tr><th><b>| ID </b></th><th><b>| Название фирмы |</b></th><th><b> Адрес |</b></th></tr>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
		}
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}?>
	</p>
	</details>
	<details>
	<summary>Информация о дозировках</summary>
   <p>
   <?php
	 include ("bd.php");    
	$query ="SELECT dose_id, dose_name, dose_info FROM dose";
 	$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
	if($result)
	{
		$rows = mysqli_num_rows($result); // количество полученных строк
		 
		echo "<table border='10' bordercolor='black'><tr><th><b>| ID </b></th><th><b>| Тип дозировки |</b></th><th><b> Информация |</b></th></tr>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
		}
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}?>
	</p>
	</details>
	<details>
	<summary>Информация о местах хранения</summary>
   <p>
   <?php
	 include ("bd.php");    
	$query ="SELECT storage_id, name, storage_form FROM storage";
 	$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
	if($result)
	{
		$rows = mysqli_num_rows($result); // количество полученных строк
		 
		echo "<table border='10' bordercolor='black'><tr><th><b>| ID </b></th><th><b>| Тип дозировки |</b></th><th><b> Информация |</b></th></tr>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
			echo "</tr>";
		}
		echo "</table>";
		 
		// очищаем результат
		mysqli_free_result($result);
	}?>
	</p>
	</details>
	 <h2>ДОБАВЛЕНИЕ ПРЕПАРАТА</h2>
		<form action="send.php" method="post">
		  <table>
			<tr>
			  <td>Наименование:</td>
			  <td><input type="text" name="Name"></td>
			</tr>
				<tr>
			  <td>Тип:</td>
			  <td><input type="text" name="Type"></td>
			</tr>
			<tr>
			  <td>Цена:</td>
			  <td><input type="float" name="Price" size="3"> руб.</td>
			</tr>
			<tr>
			  <td>Производитель(id):</td>
				<td><input type="int" name="Maker_id" size="3"></td>
			  </td>
			</tr>
			<tr>
			  <td>Количество:</td>
				<td><input type="int" name="Count" size="3"></td>
			  </td>
			</tr>
				<td>Место хранения(id):</td>
				<td><input type="int" name="Storage" size="3"></td>
			  </td>
			</tr>
				</tr>
				<td>Дозировка(id):</td>
				<td><input type="int" name="Dose" size="3"></td>
			  </td>
			</tr>
			<tr>
			  <td colspan="2"><input type="submit" value="OK"></td>
			</tr>
		  </table>
		</form>
		<h2>УДАЛЕНИЕ ПРЕПАРАТА</h2>
		<form method="post" action="remove.php">
		  <label for="prep">Название препарата:</label><br />
		  <input id="prep" name="prep" type="text" size="30" /><br />
		  <input type="submit" name="DELETE" value="DELETE" />
		</form>
	 <h2>ИЗМЕНЕНИЕ ПРЕПАРАТА</h2>
		<form action="edit.php" method="post">
		  <table>
			<tr>
			  <td>ID:</td>
			  <td><input type="text" name="ID"></td>
			</tr>
			<tr>
			  <td>Наименование:</td>
			  <td><input type="text" name="Name"></td>
			</tr>
				<tr>
			  <td>Тип:</td>
			  <td><input type="text" name="Type"></td>
			</tr>
			<tr>
			  <td>Цена:</td>
			  <td><input type="float" name="Price" size="3"> руб.</td>
			</tr>
			<tr>
			  <td>Производитель(id):</td>
				<td><input type="int" name="Maker_id" size="3"></td>
			  </td>
			</tr>
			<tr>
			  <td>Количество:</td>
				<td><input type="int" name="Count" size="3"></td>
			  </td>
			</tr>
				<td>Место хранения(id):</td>
				<td><input type="int" name="Storage" size="3"></td>
			  </td>
			</tr>
				</tr>
				<td>Дозировка(id):</td>
				<td><input type="int" name="Dose" size="3"></td>
			  </td>
			</tr>
			<tr>
			  <td colspan="2"><input type="submit" value="OK"></td>
			</tr>
		  </table>
		</form>

			<footer>
                            <footer style="background-image: url(../img/depositphotos_9794016-Seamless-medical-background.jpg)">
				
                                <div class="footer"><h2>&copy; PHARM</h2> </div>
                                
			</footer>
		</section>
	</body>
</html>

              