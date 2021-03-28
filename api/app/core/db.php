<?php


$config = require 'app/config/db.php';// Постоянно работает от корневой папки 

try 
{
		$pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['dblogin'],$config['password']);
} catch (PDOException $e) 
	{
		echo 'Ошибка БД';
		die;
	}
