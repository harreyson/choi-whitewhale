<?php
/* CardVariation Fixture generated on: 2012-02-06 17:20:00 : 1328574000 */

/**
 * CardVariationFixture
 *
 */
class CardVariationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'card_variation_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'front_img' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'rear_img' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'is_base' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'unique', 'collate' => NULL, 'comment' => ''),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'card_variation_id', 'unique' => 1), 'name_UNIQUE' => array('column' => 'name', 'unique' => 1), 'is_base_UNIQUE' => array('column' => 'is_base', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'card_variation_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'front_img' => 'Lorem ipsum dolor sit amet',
			'rear_img' => 'Lorem ipsum dolor sit amet',
			'is_base' => 1,
			'card_id' => 1
		),
	);
}
