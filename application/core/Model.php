<?php

namespace application\core;

use application\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
			try {
				$this->db = new Db;
			} catch (PDOException $e) {
				echo $e->getMessage;
			}
			
			
	}

}