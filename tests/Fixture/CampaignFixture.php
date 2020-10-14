<?php
/**
 * Short description for campaign_fixture.php
 *
 * Long description for campaign_fixture.php
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
 * CampaignFixture class
 *
 * @package       Cake.Test.Fixture
 */
class CampaignFixture extends TestFixture {

/**
 * fields property
 *
 * @var array
 */
	public $fields = array(
		'id' => ['type' => 'integer'],
		'name' => ['type' => 'string', 'length' => 255, 'null' => false],
		'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
	);

/**
 * records property
 *
 * @var array
 */
	public $records = array(
		array('name' => 'Hurtigruten'),
		array('name' => 'Colorline'),
		array('name' => 'Queen of Scandinavia')
	);
}