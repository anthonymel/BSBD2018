﻿<?php
    // Указываем кодировку
    header('Content-Type: text/html; charset=utf-8');
 
    $server = "localhost"; /* имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost */
    $username = "admin"; /* Имя пользователя БД */
    $password = "123"; /* Пароль пользователя, если у пользователя нет пароля то, оставляем пустым */
    $database = "pharma"; /* Имя базы данных, которую создали */
     
    // Подключение к базе данный через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Проверяем, успешность соединения. 
    if (mysqli_connect_errno()) { 
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit(); 
    }
 
    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');

?>