<?php

namespace application\models;

use application\core\Model;


class Admin extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function testValidate($post, $type) {
		
		$descriptionLen = iconv_strlen($post['description']);
		$quizLen = iconv_strlen($post['quiz']);
		$trueanswerLen = iconv_strlen($post['trueanswer']);
		$ALen = iconv_strlen($post['A']);
		$BLen = iconv_strlen($post['B']);
		$CLen = iconv_strlen($post['C']);
		$DLen = iconv_strlen($post['D']);

	 if ($descriptionLen < 3 or $descriptionLen > 800) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		}elseif ($quizLen < 3 or $quizLen > 5000) {
			$this->error = 'Вопрос должен содержать от 3 до 500 символов';
			return false;
		}elseif ($trueanswerLen != 1) {
			$this->error = 'Правильный ответ 1 символ(ABCD)';
			return false;
		}elseif ($ALen < 1 or $ALen > 500) {
			$this->error = 'Ответ A должен содержать от 3 до 500 символов';
			return false;
		}elseif ($BLen < 1 or $BLen > 500) {
			$this->error = 'Ответ B должен содержать от 3 до 500 символов';
			return false;
		}elseif ($CLen < 1 or $CLen > 500) {
			$this->error = 'Ответ C должен содержать от 3 до 500 символов';
			return false;
		}elseif ($DLen < 1 or $DLen > 500) {
			$this->error = 'Ответ D должен содержать от 3 до 500 символов';
			return false;
		}

	return true;
	}

	public function testAdd($post) {
		$params = [
			'id' => '',
			'description' => $post['description'],
			'quiz' => $post['quiz'],
			'trueanswer' => $post['trueanswer'],
			'A' => $post['A'],
			'B' => $post['B'],
			'C' => $post['C'],
			'D' => $post['D']
		];
		$this->db->query('INSERT INTO quizbot VALUES (:id, :description, :quiz, :trueanswer,:A,:B,:C,:D)', $params);
		return $this->db->lastInsertId();
	}

	public function testEdit($post, $id) {
		$params = [
			'id' => $id,
			'description' => $post['description'],
			'quiz' => $post['quiz'],
			'trueanswer' => $post['trueanswer'],
			'A' => $post['A'],
			'B' => $post['B'],
			'C' => $post['C'],
			'D' => $post['D']
		];
		if ($this->db->query('UPDATE quizbot SET description = :description, quiz = :quiz, trueanswer = :trueanswer , A = :A ,B = :B, C = :C , D = :D WHERE id = :id', $params)) {

		return true;
		}else return false;
		
	}

	public function isTestExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM quizbot WHERE id = :id', $params);
	}

	public function testDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM quizbot WHERE id = :id', $params);
	}

	public function testsData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM quizbot WHERE id = :id', $params);
	}

	public function nextquiz($id = 1)
	{
		$params = [
			'id' => $id,
		];
		$res = $this->db->row('SELECT * FROM quizbot WHERE id = :id', $params);
		if ($res) {
			return $res;
		}else {
			return false;
		}

	}

	public function true($id = 1,$post)
	{
		$params = [
			'id' => $id
		];
		$row = $this->db->row('SELECT * FROM quizbot WHERE id = :id', $params);
		$answer = $row[0]['trueanswer'];
		if ($answer == @$post['quiz']) {
			$_SESSION['trueanswers']++;
			return true;
		}else return false;
	}

	public function lastQuiz()
	{

		return $row = $this->db->row('SELECT max(ID) from quizbot');
	}

	public static function unsetQuiz()
	{
		unset($_SESSION['trueanswers']);
		unset($_SESSION['quiz']);
	}

}


