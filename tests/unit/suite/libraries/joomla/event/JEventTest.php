<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once JPATH_BASE.'/libraries/joomla/event/event.php';
require_once dirname(__FILE__).'/JEventStub.php';
/**
 * Test class for JEvent.
 * Generated by PHPUnit on 2009-10-09 at 14:08:04.
 */
class JEventTest extends PHPUnit_Framework_TestCase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @access protected
	 */
	protected function setUp() {

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @access protected
	 */
	protected function tearDown() {
	}

	/**
	 * tests the firing up the update event with no arguments
	 */
	public function testUpdateNoArgs() {
		// get a mock for the 
		$observable = $this->getMock('Observable', array('attach'));
		
		// we expect that the attach method of our mock object will be called
		// because when we instantiate an observer it needs something observable
		// to attach itself to
		$observable->expects($this->once())
					->method('attach');

		// we create our object and pass our mock
		$object = new JEventStub($observable);

		// we reset the calls property.  Our stub method will populate this when it gets called
		$object->calls = array();

		// we setup the arguments to pass to update and call it.
		$args = array(
			'event' => 'myEvent'
		);
		
		// we call update and assert that it returns true (the value from the stub)
		$this->assertThat(
			$object->update($args),
			$this->equalTo(true)
		);

		// first, we want to assert that myEvent was called
		$this->assertThat(
			$object->calls[0]['method'],
			$this->equalTo('myEvent')
		);

		// with no arguments
		$this->assertThat(
			$object->calls[0]['args'],
			$this->equalTo(array())
		);
		
		// only once
		$this->assertThat(
			count($object->calls),
			$this->equalTo(1)
		);
	}

	/**
	 * tests the firing up the update event with one argument
	 */
	public function testUpdateOneArg() {
		// get a mock for the 
		$observable = $this->getMock('Observable', array('attach'));
		
		// we expect that the attach method of our mock object will be called
		// because when we instantiate an observer it needs something observable
		// to attach itself to
		$observable->expects($this->once())
					->method('attach');

		// we create our object and pass our mock
		$object = new JEventStub($observable);

		// we reset the calls property.  Our stub method will populate this when it gets called
		$object->calls = array();

		// we setup the arguments to pass to update and call it.
		$args = array('myFirstArgument');
		$args['event'] = 'myEvent';
		
		// we call update and assert that it returns true (the value from the stub)
		$this->assertThat(
			$object->update($args),
			$this->equalTo(true)
		);

		// first, we want to assert that myEvent was called
		$this->assertThat(
			$object->calls[0]['method'],
			$this->equalTo('myEvent')
		);

		// with one arguments
		$this->assertThat(
			$object->calls[0]['args'],
			$this->equalTo(array('myFirstArgument'))
		);
		
		// only once
		$this->assertThat(
			count($object->calls),
			$this->equalTo(1)
		);
	}
	
	/**
	 * tests the firing up the update event with multiple arguments
	 */
	public function testUpdateMultipleArgs() {
		// get a mock for the 
		$observable = $this->getMock('Observable', array('attach'));
		
		// we expect that the attach method of our mock object will be called
		// because when we instantiate an observer it needs something observable
		// to attach itself to
		$observable->expects($this->once())
					->method('attach');

		// we create our object and pass our mock
		$object = new JEventStub($observable);

		// we reset the calls property.  Our stub method will populate this when it gets called
		$object->calls = array();

		// we setup the arguments to pass to update and call it.
		$args = array('myFirstArgument', 5);
		$args['event'] = 'myEvent';
		
		// we call update and assert that it returns true (the value from the stub)
		$this->assertThat(
			$object->update($args),
			$this->equalTo(true)
		);

		// first, we want to assert that myEvent was called
		$this->assertThat(
			$object->calls[0]['method'],
			$this->equalTo('myEvent')
		);

		// with one arguments
		$this->assertThat(
			$object->calls[0]['args'],
			$this->equalTo(array('myFirstArgument', 5))
		);
		
		// only once
		$this->assertThat(
			count($object->calls),
			$this->equalTo(1)
		);
	}

	/**
	 * tests the firing of an event that does not exist
	 */
	public function testUpdateBadEvent() {
		// get a mock for the 
		$observable = $this->getMock('Observable', array('attach'));
		
		// we expect that the attach method of our mock object will be called
		// because when we instantiate an observer it needs something observable
		// to attach itself to
		$observable->expects($this->once())
					->method('attach');

		// we create our object and pass our mock
		$object = new JEventStub($observable);

		// we reset the calls property.  Our stub method will populate this when it gets called
		$object->calls = array();

		// we setup the arguments to pass to update and call it.
		$args = array('myFirstArgument');
		$args['event'] = 'myNonExistentEvent';
		
		// we call update and assert that it returns null (the value from the stub)
		$this->assertThat(
			$object->update($args),
			$this->equalTo(null)
		);

		// first, we want to assert that no methods were called
		$this->assertThat(
			count($object->calls),
			$this->equalTo(0)
		);
	}


}

