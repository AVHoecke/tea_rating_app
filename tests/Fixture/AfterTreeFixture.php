<?php
/**
 * Short description for after_tree_fixture.php
 *
 * Long description for after_tree_fixture.php
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          http://www.cakephp.org
 * @package       Cake.Test.Fixture
 * @since         1.2
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Test\Fixture;


/**
 * AfterTreeFixture class
 *
 * @package       Cake.Test.Fixture
 */
class AfterTreeFixture extends TestFixture {

/**
 * fields property
 *
 * @var array
 */
	public $fields = array(
		'id' => ['type' => 'integer'],
		'parent_id' => ['type' => 'integer'],
		'lft' => ['type' => 'integer'],
		'rght' => ['type' => 'integer'],
		'name' => ['type' => 'string', 'length' => 255, 'null' => false],
		'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
	);

/**
 * records property
 *
 * @var array
 */
	public $records = array(
		array('parent_id' => null, 'lft' => 1, 'rght' => 2, 'name' => 'One'),
		array('parent_id' => null, 'lft' => 3, 'rght' => 4, 'name' => 'Two'),
		array('parent_id' => null, 'lft' => 5, 'rght' => 6, 'name' => 'Three'),
		array('parent_id' => null, 'lft' => 7, 'rght' => 12, 'name' => 'Four'),
		array('parent_id' => null, 'lft' => 8, 'rght' => 9, 'name' => 'Five'),
		array('parent_id' => null, 'lft' => 10, 'rght' => 11, 'name' => 'Six'),
		array('parent_id' => null, 'lft' => 13, 'rght' => 14, 'name' => 'Seven')
	);
}