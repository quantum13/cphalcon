<?php

namespace Frontend;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
	public $initialized = false;
	public $servicesRegistered = false;

	public function registerAutoloaders(\Phalcon\DiInterface $di=null)
	{
		// Creates the autoloader
		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Frontend\Controllers' => 'unit-tests/modules/frontend/controllers/',
		));

		$loader->register();

		$di->set('frontendLoader', $loader);
	}

	public function registerServices(\Phalcon\DiInterface $di)
	{
		$di->set('view', function() {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir('unit-tests/modules/frontend/views/');
			return $view;
		});

		$this->servicesRegistered = true;
	}


	public function initialize($di)
	{
		$this->initialized = true;
	}

}
