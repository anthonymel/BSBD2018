<?php
		include("bd.php");
		if ( !empty($_COOKIE['login']) and !empty($_COOKIE['token']) ) {
			//����� ����� � ���� �� ��� � ���������� (��� �������� ������):
			$login = $_COOKIE['login'];
			if ($login=='admin') $admin=true; else $admin=false;
			$token = $_COOKIE['token']; //���� �� ��� (������ ������, � ���� ���� cookie)
			$id = $_COOKIE['id'];

			/*
				��������� � �������� SQL ������:
				������� �� �������_users ��� ����_����� = $login.
			*/
			$query = 'SELECT * FROM sessions WHERE user_id="'.$id.'" AND token="'.$token.'"';

			//����� ���� ������� � ���������� $result:
			$loginresult = mysqli_fetch_assoc(mysqli_query($db, $query)); 
		}

?>