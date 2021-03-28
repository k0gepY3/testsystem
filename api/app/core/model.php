<?php
require 'db.php';
require 'app/core/dev.php';

###############check/validate functions###################


function checkToken($tokens, $params)
{
		foreach ($tokens as $key => $value) {
		if ($value == $params[0]) {
			return true;
		}
	}
	return false;
}


###############Database request functions###################

function quiz($pdo,$id)
{
	if ($id == '' or $id == 0) {
		echo json_encode('Пустой ID');
		die;
	}
	@$query = $pdo->query("SELECT * FROM quizbot WHERE id = $id");
	@$row = $query->fetchAll($pdo::FETCH_ASSOC);
	if (!$row) {
		echo json_encode('Несуществующий ID вопроса');
		die;
	}
	return $row;
}





