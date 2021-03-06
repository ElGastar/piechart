<?php
# Автоподгрузка классов
function __autoload($name){ include("classes/".$name.".php");}
?>
<HTML>
<HEAD><TITLE>Установка БД</TITLE></HEAD>
<?
if (empty($_POST['user']) || empty($_POST['pass']))
{
?>
<body>
<BR>
Заполните форму:<BR>
<form method="POST" action="install.php">
Имя: <input type="text" name="user" size="20"><BR>
Пароль: <input type="password" name="pass" size="20"><BR>
<input type="submit" value="Submit" name="submit">
</form>
<?
}
else
{

echo 'CREATE database<br>';
$sql = "CREATE TABLE IF NOT EXISTS `table` (
	`gid` varchar(250) NOT NULL ,
	`child_name` varchar(250) ,
	`child_surname` varchar(250)  ,
	`scool_id` int(11) ,
	`classnum` int(11) ,
	`rid` int(255) ,
	`1` int(11) ,
    `2` int(11) ,
    `3` int(11) ,
    `4` int(11) ,
    `5` int(11) ,
    `6` int(11) ,
	PRIMARY KEY (`rid`)
);";
$data = "
LOAD DATA INFILE 'export_file.csv'
INTO TABLE table_name
IGNORE 1 ROWS;
";


 Database::init()->setTable($sql);
 Database::init()->setTable($data);
?>
<br>Если нет ошибок, то установка была успешной! Теперь удалите файл install.php, чтобы предотвратить потерю данных.
<?
}
?>
</body>
</HTML>