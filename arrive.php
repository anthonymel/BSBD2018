

<?php
// вся процедура работает на сесиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
//session_start();
include ("cookies.php");
if (empty($loginresult)) {
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
			<li><a href="index.php">ГЛАВНАЯ</a></li>
            <li><a href="prep.php">АССОРТИМЕНТ</a></li>
            <li><a href="login.php">АВТОРИЗАЦИЯ</a></li>
            <li><a href="admin.php">УПРАВЛЕНИЕ</a></li>
			<li><a href="new.php">ПОСТУПЛЕНИЯ</a></li>
            </ul>
        </div>
        <div class="bg-2"></div>
        </div>
			<center style="background-image: url(../img/blue-background.jpg)">
				<page>
                                    <marquee class="style-marquee" direction="left" behavior="scroll" scrollamount="12" >РУП "БелФармация" находится в г.Йошкар-ола ул.Строителей 58 телефон 8(987)-456-32-45</marquee>
                                    
                                    </page>
		
	 </head>
	 <body>
	 <h2>НАШИ ПОСТАВЩИКИ</h2>
	 	 <?php
	 include ("bd.php"); 
     
     
$query ="SELECT maker_name, maker_adress FROM maker";
 
$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table border='10' bordercolor='black'><tr><th><b>| Название организации |</b></th><th><b> Адрес | </b></th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    // очищаем результат
    mysqli_free_result($result);
}?>


			<footer>
                            <footer style="background-image: url(../img/depositphotos_9794016-Seamless-medical-background.jpg)">
				
                                <div class="footer"><h2>&copy; PHARM</h2> </div>
                                
			</footer>
		</section>
	</body>
</html>

              