<?php
// Этот блок кода нужен для корректной работы Ajax скрипта
sleep(1); 
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// Преобразуем полученые данные в нужную кодировку
while(list ($key, $val) = each ($_POST)){$_POST[$key] = iconv("UTF-8","CP1251", $_POST[$key]);}

if ($_POST['select'] != 0){
	$select = $_POST['select'];

	include("config.php");
	if (!mysqli_query($con, "DELETE FROM categories WHERE id = '{$select}'")) {
		printf("Errormessage: %s\n", mysqli_error($con));
	}
	echo '<font color="#133b5e">Категория удалена </font>';
}else {echo '<font color="#133b5e">Выберите категорию для удаления</font>';}
?>