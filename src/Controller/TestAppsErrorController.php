<?php

namespace Controller;

use App\Controller\CakeErrorController;

class TestAppsErrorController extends CakeErrorController {

	public $helpers = array(
		'Html',
		'Session',
		'Form',
		'Banana',
	);

}
