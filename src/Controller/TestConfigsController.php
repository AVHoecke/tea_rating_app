<?php

namespace Controller;

use App\Controller\CakeErrorController;

class TestConfigsController extends CakeErrorController {

	public $components = array(
		'RequestHandler' => array(
			'some' => 'config'
		)
	);

}
