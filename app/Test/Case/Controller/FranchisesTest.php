<?php
/* Franchises Test cases generated on: 2012-02-13 18:25:05 : 1329182705*/
App::uses('Franchises', 'Controller');

/**
 * TestFranchises *
 */
class TestFranchises extends Franchises {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * Franchises Test Case
 *
 */
class FranchisesTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.comment', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Franchises = new TestFranchises();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Franchises);

		parent::tearDown();
	}

}
