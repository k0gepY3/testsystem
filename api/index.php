<?php
header('Content-type: application/json');

require 'app/core/model.php';
$tokens = require 'app/config/users.php';



if (!isset($_GET) or 
		@$_GET['res'] == '' or 
		@$_GET['res'] == '/') {
	echo json_encode('Неподдерживаемый формат API');
	die;
}

$type = $_GET['res'];

$params = explode('/', $type);


if (count($params) !== 3) {
	echo json_encode('Неподдерживаемый формат API');
	die;
}

$method = $params[1];
$id = $params[2];

if (checkToken($tokens, $params))
{
	if ($method == 'getQuiz') {
		echo $result = json_encode(quiz($pdo ,$id));
	}else echo json_encode('Несуществующий метод');
}else echo  json_encode('Несуществующий токен');