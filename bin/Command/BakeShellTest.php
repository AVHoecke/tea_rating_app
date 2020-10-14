<?php
/**
 * BakeShell Test Case
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       Cake.Test.Case.Console.Command
 * @since         CakePHP(tm) v 1.3
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace bin\Command;

use App\Console\Command\BakeShell;
use App\Console\Command\Task\ControllerTask;
use App\Console\Command\Task\DbConfigTask;
use App\Console\Command\Task\ModelTask;
use App\Model\User;
use Cake\Console\ConsoleInput;
use Cake\Console\ConsoleOutput;
use Cake\Console\Shell;
use Cake\Console\ShellDispatcher;
use Cake\Controller\Controller;


if (!class_exists('UsersController')) {
	class UsersController extends Controller {
	}
}

class BakeShellTest extends TestCase {

/**
 * fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'core.users'
	);

/**
 * setup test
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$out = $this->getMock('ConsoleOutput', array(), array(), '', false);
		$in = $this->getMock('ConsoleInput', array(), array(), '', false);

		$this->Shell = $this->getMock(
			'BakeShell',
			array('in', 'out', 'hr', 'err', 'createFile', '_stop', '_checkUnitTest'),
			array($out, $out, $in)
		);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
		unset($this->Dispatch, $this->Shell);
	}

/**
 * test bake all
 *
 * @return void
 */
	public function testAllWithModelName() {
		$userExists = class_exists('User');
		$this->skipIf($userExists, 'User class exists, cannot test `bake all [param]`.');

		$this->Shell->Model = $this->getMock('ModelTask', array(), array(&$this->Dispatcher));
		$this->Shell->Controller = $this->getMock('ControllerTask', array(), array(&$this->Dispatcher));
		$this->Shell->View = $this->getMock('ModelTask', array(), array(&$this->Dispatcher));
		$this->Shell->DbConfig = $this->getMock('DbConfigTask', array(), array(&$this->Dispatcher));

		$this->Shell->DbConfig->expects($this->once())
			->method('getConfig')
			->will($this->returnValue('test'));

		$this->Shell->Model->expects($this->never())
			->method('getName');

		$this->Shell->Model->expects($this->once())
			->method('bake')
			->will($this->returnValue(true));

		$this->Shell->Controller->expects($this->once())
			->method('bake')
			->will($this->returnValue(true));

		$this->Shell->View->expects($this->once())
			->method('execute');

		$this->Shell->expects($this->once())->method('_stop');
		$this->Shell->expects($this->at(0))
			->method('out')
			->with('Bake All');

		$this->Shell->expects($this->at(5))
			->method('out')
			->with('<success>Bake All complete</success>');

		$this->Shell->connection = '';
		$this->Shell->params = array();
		$this->Shell->args = array('User');
		$this->Shell->all();

		$this->assertEquals('User', $this->Shell->View->args[0]);
	}
}