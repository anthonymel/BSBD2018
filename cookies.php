<?php
		include("bd.php");
		if ( !empty($_COOKIE['login']) and !empty($_COOKIE['token']) ) {
			//Пишем логин и ключ из КУК в переменные (для удобства работы):
			$login = $_COOKIE['login'];
			if ($login=='admin') $admin=true; else $admin=false;
			$token = $_COOKIE['token']; //ключ из кук (аналог пароля, в базе поле cookie)
			$id = $_COOKIE['id'];

			/*
				Формируем и отсылаем SQL запрос:
				ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login.
			*/
			$query = 'SELECT * FROM sessions WHERE user_id="'.$id.'" AND token="'.$token.'"';

			//Ответ базы запишем в переменную $result:
			$loginresult = mysqli_fetch_assoc(mysqli_query($db, $query)); 
		}

?>