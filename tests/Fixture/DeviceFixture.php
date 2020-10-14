<?php
/**
 * Short description for file.
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
 * @package       Cake.Test.Fixture
 * @since         CakePHP(tm) v 1.2.0.4667
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;


/**
 * Short description for class.
 *
 * @package       Cake.Test.Fixture
 */
class DeviceFixture extends TestFixture {

/**
 * fields property
 *
 * @var array
 */
	public $fields = array(
		'id' => ['type' => 'integer'],
		'device_type_id' => ['type' => 'integer', 'null' => false],
		'name' => ['type' => 'string', 'null' => false],
		'typ' => ['type' => 'integer', 'null' => false],
		'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
	);

/**
 * records property
 *
 * @var array
 */
	public $records = array(
		array('device_type_id' => 1, 'name' => 'Device 1', 'typ' => 1),
		array('device_type_id' => 1, 'name' => 'Device 2', 'typ' => 1),
		array('device_type_id' => 1, 'name' => 'Device 3', 'typ' => 2)
	);
}