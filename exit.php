<?php
		$dellogin=$_COOKIE['login'];
		$deltoken=$_COOKIE['token'];
		$delid=$_COOKIE['id'];
		include("bd.php");
		$query = "DELETE FROM sessions WHERE token='$deltoken'";
		mysqli_query($db, $query);
		setcookie('login', '', time()); //удаляем логин
		setcookie('token', '', time()); //удаляем ключ
		setcookie('id', '', time());

		header('Location: login.php');

?>