<?php
/**
 * BasicAuthenticationTest file
 *
 * CakePHP(tm) Tests <https://book.cakephp.org/2.0/en/development/testing.html>
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://book.cakephp.org/2.0/en/development/testing.html CakePHP(tm) Tests
 * @package       Cake.Test.Case.Network.Http
 * @since         CakePHP(tm) v 2.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Test\TestCase\Network\Http;

use App\Network\Http\BasicAuthentication;
use App\Network\Http\HttpSocket;


/**
 * TestSslHttpSocket
 *
 * @package       Cake.Test.Case.Network.Http
 */
class TestSslHttpSocket extends Client {

/**
 * testSetProxy method
 *
 * @return void
 */
	public function testSetProxy($proxy = null) {
		$this->_proxy = $proxy;
		$this->_setProxy();
	}

}

/**
 * BasicMethodTest class
 *
 * @package       Cake.Test.Case.Network.Http
 */
class BasicAuthenticationTest extends TestCase {

/**
 * testAuthentication method
 *
 * @return void
 */
	public function testAuthentication() {
		$http = new Client();
		$auth = array(
			'method' => 'Basic',
			'user' => 'mark',
			'pass' => 'secret'
		);

		BasicAuthentication::authentication($http, $auth);
		$this->assertEquals('Basic bWFyazpzZWNyZXQ=', $http->request['header']['Authorization']);
	}

/**
 * testProxyAuthentication method
 *
 * @return void
 */
	public function testProxyAuthentication() {
		$http = new Client();
		$proxy = array(
			'method' => 'Basic',
			'user' => 'mark',
			'pass' => 'secret'
		);

		BasicAuthentication::proxyAuthentication($http, $proxy);
		$this->assertEquals('Basic bWFyazpzZWNyZXQ=', $http->request['header']['Proxy-Authorization']);
	}

/**
 * testProxyAuthenticationSsl method
 *
 * @return void
 */
	public function testProxyAuthenticationSsl() {
		$http = new TestSslHttpSocket();
		$http->request['uri']['scheme'] = 'https';
		$proxy = array(
			'host' => 'localhost',
			'port' => 3128,
			'method' => 'Basic',
			'user' => 'mark',
			'pass' => 'secret'
		);

		$http->testSetProxy($proxy);

		$this->assertEquals('Basic bWFyazpzZWNyZXQ=', $http->config['proxyauth']);
		$this->assertFalse(isset($http->request['header']['Proxy-Authorization']));
	}

}