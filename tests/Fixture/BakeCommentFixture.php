<?php
/**
 * BakeCommentFixture
 *
 * CakePHP(tm) Tests <https://book.cakephp.org/2.0/en/development/testing.html>
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://book.cakephp.org/2.0/en/development/testing.html CakePHP(tm) Tests
 * @package       Cake.Test.Fixture
 * @since         CakePHP(tm) v 2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;


/**
 * BakeCommentFixture fixture for testing bake
 *
 * @package       Cake.Test.Fixture
 */
class BakeCommentFixture extends TestFixture {

/**
 * fields property
 *
 * @var array
 */
	public $fields = array(
		'otherid' => ['type' => 'integer'],
		'bake_article_id' => ['type' => 'integer', 'null' => false],
		'bake_user_id' => ['type' => 'integer', 'null' => false],
		'comment' => 'text',
		'published' => ['type' => 'string', 'length' => 1, 'default' => 'N'],
		'created' => 'datetime',
		'updated' => 'datetime',
		'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['otherid']]]
	);

/**
 * records property
 *
 * @var array
 */
	public $records = array();
}