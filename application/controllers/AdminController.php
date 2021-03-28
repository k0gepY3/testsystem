<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;
use application\core\Db;

class AdminController extends Controller {


	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function indexAction() {

		$temp = $this->model->lastQuiz();
		$max = $temp[0]['max(ID)'];

		if (isset($_POST['reset'])) {
			$this->model->unsetQuiz();
		}


		if (!isset($_SESSION['quiz']) and !isset($_SESSION['trueanswers'])) {
			$_SESSION['quiz'] = 1;
			$_SESSION['trueanswers'] = 0;
			$q = $this->model->nextquiz();
			if ($q) {
				$vars = 
				[	
					'quiz' => $q
				];
			}else{
				$vars = [];
			}

			$this->view->render('Вопросы',$vars,'default');


		}elseif(@$_SESSION['quiz'] == $max){
			$this->model->true($_SESSION['quiz'],$_POST);
			$vars = 
			[	
				'result' => $_SESSION['trueanswers']
			];
			$this->view->render('Вопросы',$vars,'default');
			unset($_SESSION['quiz']);
			unset($_SESSION['trueanswers']);
		}elseif (isset($_SESSION['quiz']) and isset($_SESSION['trueanswers'])) {

			$this->model->true(@$_SESSION['quiz'],$_POST);

			$_SESSION['quiz']++;
			$vars = 
			[	
				'quiz' => $this->model->nextquiz($_SESSION['quiz'])
			];

			$this->view->render('Вопросы',$vars,'default');
			
		}
		

}

	public function loginAction() {
		$this->model->unsetQuiz();
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/add');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('Ошибка!', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/add');
		}
		$this->view->render('Вход');
	}

	public function addAction() {
		$this->model->unsetQuiz();
		if (!empty($_POST)) {
			if (!$this->model->testValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->testAdd($_POST);
			if (!$id) {
				$this->view->message('Ошибка!', 'Ошибка обработки запроса');
			}
			$this->view->message('OK!', 'Тест добавлен');
		}
		$this->view->render('Добавить тест',$vars = [],'admin');
	}

	public function editAction() {
		if (!$this->model->isTestExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->testValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error);
			}
			if ($this->model->testEdit($_POST, $this->route['id'])) {
				$this->view->message('OK!', 'Сохранено');
			}else $this->view->message('Ошибка!', 'Ошибка обработки запроса');
		}
		$vars = [
			'data' => $this->model->testsData($this->route['id'])[0],
		];
		$this->view->render('Редактировать тест', $vars,'admin');
	}

	public function deleteAction() {
		if (!$this->model->isTestExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->testDelete($this->route['id']);
		$this->view->redirect('admin/tests');
	}

	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('login');
	}

	public function testsAction() {

		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->testsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->testsList($this->route),
		];
		$this->view->render('Тесты', $vars,'admin');
	}


}