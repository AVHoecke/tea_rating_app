<?php
/**
 * ControllerTestCaseTest file
 *
 * Test Case for ControllerTestCase class
 *
 * CakePHP : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP Project
 * @package       Cake.Test.Case.Event
 * @since         CakePHP v 2.1
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Test\TestCase\Event;

use Cake\Event\Event;


/**
 * Tests the Event class functionality
 */
class CakeEventTest extends TestCase {

/**
 * Tests the name() method
 *
 * @return void
 * @triggers fake.event
 */
	public function testName() {
		$event = new Event('fake.event');
		$this->assertEquals('fake.event', $event->name());
	}

/**
 * Tests the subject() method
 *
 * @return void
 * @triggers fake.event $this
 * @triggers fake.event
 */
	public function testSubject() {
		$event = new Event('fake.event', $this);
		$this->assertSame($this, $event->subject());

		$event = new Event('fake.event');
		$this->assertNull($event->subject());
	}

/**
 * Tests the event propagation stopping property
 *
 * @return void
 * @triggers fake.event
 */
	public function testPropagation() {
		$event = new Event('fake.event');
		$this->assertFalse($event->isStopped());
		$event->stopPropagation();
		$this->assertTrue($event->isStopped());
	}

/**
 * Tests that it is possible to get/set custom data in a event
 *
 * @return void
 * @triggers fake.event $this, array('some' => 'data')
 */
	public function testEventData() {
		$event = new Event('fake.event', $this, array('some' => 'data'));
		$this->assertEquals(array('some' => 'data'), $event->data);
	}

/**
 * Tests that it is possible to get the name and subject directly
 *
 * @return void
 * @triggers fake.event $this
 */
	public function testEventDirectPropertyAccess() {
		$event = new Event('fake.event', $this);
		$this->assertEquals($this, $event->subject);
		$this->assertEquals('fake.event', $event->name);
	}
}