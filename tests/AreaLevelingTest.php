<?php
namespace AreaLeveling;

use AreaLeveling\AreaLeveling;

class AreaLevelingTest extends \PHPUnit_Framework_TestCase {
	private $areaLeveling;
	
	protected function setUp() {
		$this->areaLeveling = new AreaLeveling();
	}
	
	public function testFormatData() {
		$this->assertEquals(
			array(1,0,3,1),
			$this->areaLeveling->formatData(array('10','31'))
		);		
	}
	
	/**
	 * 
	 * @param array $ground
	 * @param int $result
	 * @dataProvider dataProvider
	 */
	public function testGetMinEffort($ground, $result) {
		$this->assertEquals(
			$result,
			$this->areaLeveling->getMinEffort($ground)
		);
	}
	
	public function dataProvider() {
		return array(
			array(array('10', '31'), 2),
			array(array('54454', '61551'), 7),
			array(array('989'), 0),
			array(array('90'), 8)
		);
	}
}