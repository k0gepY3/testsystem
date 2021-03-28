<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;


	public function testsCount() {
		return $this->db->column('SELECT COUNT(id) FROM quizbot');
	}

	public function testsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM quizbot ORDER BY id DESC LIMIT :start, :max', $params);
	}

}