<?php

return [
	// AdminController
	'' => [
		'controller' => 'admin',
		'action' => 'index',
	],

	'quiz' => [
		'controller' => 'admin',
		'action' => 'quiz',
	],

	'index' => [
		'controller' => 'admin',
		'action' => 'index',
	],
	'login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/tests/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'tests',
	],
	'admin/tests' => [
		'controller' => 'admin',
		'action' => 'tests',
	],
];