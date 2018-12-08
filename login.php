
<?php
// вся процедура работает на сесиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
//session_start();
include ("bd.php");
include ("cookies.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>БелФармация</title>
                <meta http-equiv ="Content-Type" content="text/html; charset=UTF-8">
                     <link rel="stylesheet" href="/css/reset.css">
                 <link rel="stylesheet" href="/css/news1.css">
                    <!-- <script type="text/javascript" src="/js/snow.js"></script>
                     <script type="text/javascript" src="/js/1.js"></script> -->

	</head>
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
            <<li><a href="index.php">ГЛАВНАЯ</a></li>
            <li><a href="admin.php">УПРАВЛЕНИЕ</a></li>
			<li><a href="new.php">ПОСТУПЛЕНИЯ</a></li>
            </ul>
        </div>
        <div class="bg-2"></div>
        </div>
			<center style="background-image: url(../img/blue-background.jpg)">
				<page>
                                    <!-- <marquee class="style-marquee" direction="left" behavior="scroll" scrollamount="12" >РУП "БелФармация" находится в г.Йошкар-ола ул.Строителей 58 телефон 8(987)-456-32-45</marquee> -->
                                    
                </page>
				
	</head>
	 <body>
	 <?php if (empty($loginresult)) {?>
   <form action="testreg.php" method="post">
<!--**** testreg.php - это адрес обработчика. То есть, после нажатия на кнопку "Войти", данные из полей отправятся на страничку testreg.php методом "post" ***** -->
  <p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="20" maxlength="30">
  </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->  
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="20" maxlength="30">
  </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->  
<p>
<input type="submit" name="submit" value="Войти">
<!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
<br>
<!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Зарегистрироваться</a> 

</p></form>
<?php } ?>
<br>
<?php
// Проверяем, пусты ли пересменные логина и id пользователя
if (empty($loginresult))
{
// Если пусты, то мы не выводим ссылку
echo "Вы вошли на сайт, как гость<br>";
}
if (!empty($loginresult))
   {
   // Если не пусты, то мы выводим ссылку
   echo "Добро пожаловать!<br>";
    echo "Вы вошли на сайт, как <u>".$_COOKIE['login']."</u><br>Вы можете:<br><a href='new.php'> Просмотреть поступления </a><br><a href='arrive.php'> Просмотреть поставщиков </a>";
	echo "<br><a href='exit.php'>Выйти</a><br>";
	if ($_COOKIE['login'] == 'admin') {
		echo "Вы вошли с правами администратора!";
		echo "<br><a href='admin.php'>Управление</a><br>";
	}

 }
 
	   
?>
<br/><h2>ПОИСК ПРЕПАРАТА</h2>
<form action="" method="post">
		  <table>
			<tr>
			  <td>Наименование:</td>
			  <td><input type="text" name="Name"></td>
			</tr>
			<tr>
			  <td colspan="2"><input type="submit" value="Найти"></td>
			</tr>
		  </table>
		</form>
<?php
include ("bd.php"); 
if (!empty($_REQUEST['Name'])) {

$name = mysqli_real_escape_string($db,$_REQUEST['Name']);     

$sql = "SELECT prep_name, prep_type, arrival_amount, maker_name, storage.storage_form, storage.name FROM prep JOIN arrival using(prep_id) join maker using(maker_id) join storage using(storage_id) where prep_name LIKE'%".$name."%'"; 
$r_query = mysqli_query($db,$sql); 

while ($row = mysqli_fetch_array($r_query)){  
echo 'Название препарата: ' .$row['prep_name'];  
echo '<br /> Цена: ' .$row['arrival_amount'].'руб.';  
echo '<br /> Производитель: '.$row['maker_name'];  
echo '<br /> Форма хранения: '.$row['storage_form'];  
echo '<br /> Место хранения: '.$row['name'];   
}  

}
?>


			<footer>
                            <footer style="background-image: url(../img/depositphotos_9794016-Seamless-medical-background.jpg)">
				
                                <div class="footer"><h2>&copy; PHARM</h2> </div>
                                
			</footer>
		</section>
	</body>
</html>

              