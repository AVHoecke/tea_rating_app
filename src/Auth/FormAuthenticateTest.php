<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       Cake.Test.Case.Controller.Component.Auth
 * @since         CakePHP(tm) v 2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Auth;

use App\Controller\Component\AuthComponent;
use App\Controller\Component\Auth\FormAuthenticate;
use App\Model\AppModel;
use Cake\Cache\Cache;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\TestSuite\TestCase;


require_once CAKE . 'Test' . DS . 'Case' . DS . 'Model' . DS . 'models.php';

/**
 * Test case for FormAuthentication
 *
 * @package       Cake.Test.Case.Controller.Component.Auth
 */
class FormAuthenticateTest extends TestCase {

/**
 * Fixtrues
 *
 * @var array
 */
	public $fixtures = array(
		'core.users',
		'core.auth_users'
	);

/**
 * setup
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Collection = $this->getMock('ComponentRegistry');
		$this->auth = new FormAuthenticate($this->Collection, array(
			'fields' => array('username' => 'user', 'password' => 'password'),
			'userModel' => 'User'
		));
		$password = Security::hash('password', null, true);
		$User = ClassRegistry::init('User');
		$User->updateAll(array('password' => $User->getDataSource()->value($password)));
		$this->response = $this->getMock('Response');
	}

/**
 * test applying settings in the constructor
 *
 * @return void
 */
	public function testConstructor() {
		$object = new FormAuthenticate($this->Collection, array(
			'userModel' => 'AuthUser',
			'fields' => array('username' => 'user', 'password' => 'password')
		));
		$this->assertEquals('AuthUser', $object->settings['userModel']);
		$this->assertEquals(array('username' => 'user', 'password' => 'password'), $object->settings['fields']);
	}

/**
 * test the authenticate method
 *
 * @return void
 */
	public function testAuthenticateNoData() {
		$request = new Request('posts/index', false);
		$request->data = array();
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test the authenticate method
 *
 * @return void
 */
	public function testAuthenticateNoUsername() {
		$request = new Request('posts/index', false);
		$request->data = array('User' => array('password' => 'foobar'));
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test the authenticate method
 *
 * @return void
 */
	public function testAuthenticateNoPassword() {
		$request = new Request('posts/index', false);
		$request->data = array('User' => array('user' => 'mariano'));
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test authenticate password is false method
 *
 * @return void
 */
	public function testAuthenticatePasswordIsFalse() {
		$request = new Request('posts/index', false);
		$request->data = array(
			'User' => array(
				'user' => 'mariano',
				'password' => null
		));
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * Test for password as empty string with _checkFields() call skipped
 * Refs https://github.com/cakephp/cakephp/pull/2441
 *
 * @return void
 */
	public function testAuthenticatePasswordIsEmptyString() {
		$request = new Request('posts/index', false);
		$request->data = array(
			'User' => array(
				'user' => 'mariano',
				'password' => ''
		));

		$this->auth = $this->getMock(
			'FormAuthenticate',
			array('_checkFields'),
			array(
				$this->Collection,
				array(
					'fields' => array('username' => 'user', 'password' => 'password'),
					'userModel' => 'User'
				)
			)
		);

		// Simulate that check for ensuring password is not empty is missing.
		$this->auth->expects($this->once())
			->method('_checkFields')
			->will($this->returnValue(true));

		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test authenticate field is not string
 *
 * @return void
 */
	public function testAuthenticateFieldsAreNotString() {
		$request = new Request('posts/index', false);
		$request->data = array(
			'User' => array(
				'user' => array('mariano', 'phpnut'),
				'password' => 'my password'
		));
		$this->assertFalse($this->auth->authenticate($request, $this->response));

		$request->data = array(
			'User' => array(
				'user' => array(),
				'password' => 'my password'
		));
		$this->assertFalse($this->auth->authenticate($request, $this->response));

		$request->data = array(
			'User' => array(
				'user' => 'mariano',
				'password' => array('password1', 'password2')
		));
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test the authenticate method
 *
 * @return void
 */
	public function testAuthenticateInjection() {
		$request = new Request('posts/index', false);
		$request->data = array(
			'User' => array(
				'user' => '> 1',
				'password' => "' OR 1 = 1"
		));
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * test authenticate success
 *
 * @return void
 */
	public function testAuthenticateSuccess() {
		$request = new Request('posts/index', false);
		$request->data = array('User' => array(
			'user' => 'mariano',
			'password' => 'password'
		));
		$result = $this->auth->authenticate($request, $this->response);
		$expected = array(
			'id' => 1,
			'user' => 'mariano',
			'created' => '2007-03-17 01:16:23',
			'updated' => '2007-03-17 01:18:31'
		);
		$this->assertEquals($expected, $result);
	}

/**
 * test scope failure.
 *
 * @return void
 */
	public function testAuthenticateScopeFail() {
		$this->auth->settings['scope'] = array('user' => 'nate');
		$request = new Request('posts/index', false);
		$request->data = array('User' => array(
			'user' => 'mariano',
			'password' => 'password'
		));

		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

/**
 * Test that username of 0 works.
 *
 * @return void
 */
	public function testAuthenticateUsernameZero() {
		$User = ClassRegistry::init('User');
		$User->updateAll(array('user' => $User->getDataSource()->value('0')), array('user' => 'mariano'));

		$request = new Request('posts/index', false);
		$request->data = array('User' => array(
			'user' => '0',
			'password' => 'password'
		));

		$expected = array(
			'id' => 1,
			'user' => '0',
			'created' => '2007-03-17 01:16:23',
			'updated' => '2007-03-17 01:18:31'
		);
		$this->assertEquals($expected, $this->auth->authenticate($request, $this->response));
	}

/**
 * test a model in a plugin.
 *
 * @return void
 */
	public function testPluginModel() {
		Cache::delete('object_map', '_cake_core_');
		App::build(array(
			'Plugin' => array(CAKE . 'Test' . DS . 'test_app' . DS . 'Plugin' . DS),
		), App::RESET);
		Plugin::load('TestPlugin');

		$PluginModel = ClassRegistry::init('TestPlugin.TestPluginAuthUser');
		$user['id'] = 1;
		$user['username'] = 'gwoo';
		$user['password'] = Security::hash(Configure::read('Security.salt') . 'cake');
		$PluginModel->save($user, false);

		$this->auth->settings['userModel'] = 'TestPlugin.TestPluginAuthUser';
		$this->auth->settings['fields']['username'] = 'username';

		$request = new Request('posts/index', false);
		$request->data = array('TestPluginAuthUser' => array(
			'username' => 'gwoo',
			'password' => 'cake'
		));

		$result = $this->auth->authenticate($request, $this->response);
		$expected = array(
			'id' => 1,
			'username' => 'gwoo',
			'created' => '2007-03-17 01:16:23'
		);
		$this->assertEquals(static::date(), $result['updated']);
		unset($result['updated']);
		$this->assertEquals($expected, $result);
		Plugin::unload();
	}

/**
 * test password hasher settings
 *
 * @return void
 */
	public function testPasswordHasherSettings() {
		$this->auth->settings['passwordHasher'] = array(
			'className' => 'Simple',
			'hashType' => 'md5'
		);

		$passwordHasher = $this->auth->passwordHasher();
		$result = $passwordHasher->config();
		$this->assertEquals('md5', $result['hashType']);

		$hash = Security::hash('mypass', 'md5', true);
		$User = ClassRegistry::init('User');
		$User->updateAll(
			array('password' => $User->getDataSource()->value($hash)),
			array('User.user' => 'mariano')
		);

		$request = new Request('posts/index', false);
		$request->data = array('User' => array(
			'user' => 'mariano',
			'password' => 'mypass'
		));

		$result = $this->auth->authenticate($request, $this->response);
		$expected = array(
			'id' => 1,
			'user' => 'mariano',
			'created' => '2007-03-17 01:16:23',
			'updated' => '2007-03-17 01:18:31'
		);
		$this->assertEquals($expected, $result);

		$this->auth = new FormAuthenticate($this->Collection, array(
			'fields' => array('username' => 'user', 'password' => 'password'),
			'userModel' => 'User'
		));
		$this->auth->settings['passwordHasher'] = array(
			'className' => 'Simple',
			'hashType' => 'sha1'
		);
		$this->assertFalse($this->auth->authenticate($request, $this->response));
	}

}