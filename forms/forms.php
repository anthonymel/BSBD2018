<?php
session_start();
if (!$_SESSION['logged_user']){
exit ("Этот текст видят только зарегистрированыые пользователи <br><a href='../index.html'>Главная</a>");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>БелФармация</title>
                <meta http-equiv ="Content-Type" content="text/html; charset=UTF-8">
                     <link rel="stylesheet" href="../css/forms.css">
                 <link rel="stylesheet" href="../css/style.css">
                     <script type="text/javascript" src="../js/snow.js"></script>

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
            <li><a href="../index.html">Главная</a></li>
            <li><a href="../html_files/index.php">Каталог</a></li>
            <li><a href="../forms/forms.php">Сделать заказ</a></li>
            <li><a href="./html_files/calculyator.html">Калькулятор</a></li>	
			<li><a href="../html_files/akziya2.php">Авторизация</a></li>
            <li class="none-bg"><a href="../html_files/kontakt.html">Контакты</a></li>
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
								   
								  <?php 
	require 'bb.php';

	$data = $_POST;



	//если кликнули на button
	if ( isset($data['do_forms']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите Ваше Ф.И.О.';
		}
		if ( trim($data['name']) == '' )
		{
			$errors[] = 'Введите название препарата';
		}
		if ( trim($data['number']) == '' )
		{
			$errors[] = 'Введите колличество';
		}
		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}
		


		if ( empty($errors) )
		{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('cart');
			$user->login = $data['login'];
			$user->name = $data['name'];
			$user->numder = $data['number'];
			$user->email = $data['email'];
			$user->call = $data['call'];
			
			R::store($user);
			echo '<div style="color:dreen;">Вы успешно сделали заказ!</div><hr>';
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>

	<form action="forms.php" method="POST">
	<legend><h2>Сделайте заказ в нашем магазине</h2></legend>
	<fieldset>
	<strong>Ваше Ф.И.О.</strong>
	<input type="text" placeholder="Ваше Ф.И.О." name="login" value="<?php echo @$data['login']; ?>"></br>
	
    <strong>Название препарата</strong>
	<input type="text"  placeholder="Название препарата" name="name" value="<?php echo @$data['name']; ?>"></br>
	
	<strong>Колличество</strong>
	<input type="text" placeholder="Колличество" name="number" value="<?php echo @$data['number']; ?>"></br>
	
	<strong>Ваш Email для связи </strong>
	<input type="email" placeholder="Ваш Email для связи" name="email" value="<?php echo @$data['email']; ?>"></br>
	
	<strong>Ознакомлен с уловиями доставки </strong>
	<input type="checkbox" name="call" value="<?php echo @$data['call']; ?>"> <value="recall"> Да<br><br>

	<button type="submit" width="20" name="do_forms">Отправить</button>
	    </fieldset>
</form>
                                   </div> 
				</news>
                            <news>
                                    <div>
                                        <foto style="background-image: url(../img/12.png)"></foto>
                                        <h3> <p> Новости- </p> </h3>
                                        <p>  Ученые нашли способ побороть </p> 
                                        <p>   бессонницу</p> 
                                        <p>Проблема бессонницы касается</p> 
                                        <p>не только пожилых, но и молодых людей</p> 
                                        
                                        <a href="../html_files/news1.html">подробнее</a>
                                    </div>
                                    <div>
                                        <foto style="background-image: url(../img/13.png)"></foto>
                                         <h3> <p> Новости- </p> </h3>
                                        <p>Побороть депрессию можно пением </p>
                                        <p>Исследователи из Университетского </p>
                                        <link href="css/top.css" rel="stylesheet" type="text/css"/>
                                        <p>колледжа в Лондоне установили, что</p>
                                        <p> пение может побороть....</p>
                                        <a href="../html_files/news2.html">подробнее</a>
                                    </div>
                                    <div>
                                        <foto style="background-image: url(../img/15.jpg)"></foto>
                                        <h3> <p> Новости- </p> </h3>
                                        <p>Определен лучший витамин для </p>
                                        <p>восстановления сердца и сосудов!</p> 
                                        <p>Этот витамин снижает риск сердечного</p>
                                        <p>приступа и играет важную роль </p> 
                                        <a href="../html_files/news3.html">подробнее</a>
                                    </div>
				</news>
			</center>
			<footer>
                            <footer style="background-image: url(../img/depositphotos_9794016-Seamless-medical-background.jpg)">
				
                                <div class="footer"><h2>&copy; Лазарева Ольга</h2> </div>
                                
			</footer>
		</section>
	</body>
</html>

              