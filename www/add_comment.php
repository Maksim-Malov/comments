<?php
// Этот блок кода нужен для корректной работы Ajax скрипта
sleep(1); 
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// Преобразуем полученые данные в нужную кодировку
while(list ($key, $val) = each ($_POST)){$_POST[$key] = iconv("UTF-8","CP1251", $_POST[$key]);}
// Устанавливаем значение даты
$date_add = date("Y-m-d H:i:s");    //*************************
// Устанавливаем параметры валидации
$nl = strlen($_POST['name']);
$ml = strlen($_POST['mail']);
$tl = strlen($_POST['text']);
$name = $_POST['name'];
$mail = $_POST['mail'];
$text = $_POST['text'];
$select = $_POST['select'];

if($nl<0 or $nl>60 or $ml<0 or $ml>60 or $tl<0 or $tl>500 or $_POST['nr']!='nerobot') {$validate = false;}
elseif(!preg_match('/^[a-z][a-z0-9-_\.]{1,30}$/i',$name)) {$validate = false;}
elseif(!preg_match('/^[a-z0-9]+(([a-z0-9_.-]+)?)@[a-z0-9+](([a-z0-9_.-]+)?)+\.+[a-z]{2,4}$/i',$mail)) {$validate = false;}
elseif(!preg_match('/^[a-z0-9][a-z0-9-.,?!"() ]{1,500}$/i',$text)) {$validate = false;}
elseif($select == 0) {$validate = false;}
else{$validate = true;}
// Если прошли валидацию
if($validate)
{
// Добавляем комментарий
include("config.php");
if (!mysqli_query($con, "insert into comments (name, mail, text, date_add, id_categories) values ('{$name}', '{$mail}', '{$text}', '{$date_add}', '{$select}')")) {
    printf("Errormessage: %s\n", mysqli_error($con));
}
echo '<font color="#133b5e">Комментарий добавлен </font>';
}
else
{
echo '<font color="red">Заполните правильно поля ввода!</font>';
}
?>