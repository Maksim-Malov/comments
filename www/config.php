<?php
	$hostname="localhost"; // Имя хоста
	$login="root"; // Логин для подкл. к серверу баз даных
	$pwd="01234"; // Пароль для подкл. к серверу баз даных
	$db_name="comment";  // Название базы даных
	//подключение к базе
	$con = @mysqli_connect($hostname, $login, $pwd, $db_name) or die("Error! connect-database");
	//mysqli_select_db($db_name, $con) or die ("Error! select-database");
	
	if (!$con) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
//echo 'Соединение установлено... ' . mysqli_get_host_info($con) . "\n";

?>