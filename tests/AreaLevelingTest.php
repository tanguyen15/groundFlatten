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
	
	public function testGetMinEffort() {
		$this->assertEquals(
			2,
			$this->areaLeveling->getMinEffort(array('10','31'))
		);
		
		$this->assertEquals(
			7,
			$this->areaLeveling->getMinEffort(array('54454','61551'))
		);
	}
}