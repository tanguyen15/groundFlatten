<?php 
namespace AreaLeveling;

class AreaLeveling {
	public function getMinEffort(array $ground) {
		$this->checkGround($ground);
		$data = $this->formatData($ground);
		/*var_dump($data);
		var_dump($this->calculateEffort($data));
		exit();*/
		
		return $this->calculateEffort($data);
	}
	
	public function checkGround($ground) {
		if (count($ground) < 1 || count($ground) > 50) {
			throw new \Exception("Ground must contain 1 and 50 elements.");
		}
		foreach ($ground as $value) {
			if (strlen($value) != strlen($ground[0])) {
				throw new \Exception("Elements must have the same length.");
			}
			if (!preg_match('/^[0-9]*$/',$value)) {
				throw new \Exception("Elements must be numeric.");
			}
		}
	}
	/**
	 * 
	 * @param array $ground
	 * @return array
	 */	
	public function formatData($ground) {
		$data = array();
		foreach ($ground as $value) {
			$tmp = str_split($value);
			$data = array_merge($data,$tmp);
		}
		return $data;
	}
	
	public function calculateEffort($ground) {
		$average = array_sum ($ground) / count($ground);var_dump($average);
		$nbEffort = 0;
		foreach ($ground as $value) {
			if ($value > $average) {
				while ($value > ($average + 1)) {
					$nbEffort ++;
					$value -= 1;
				}
			} else {
				while (($value + 1) <= $average) {
					$nbEffort ++;
					$value ++;
				}
			}
		}
		return $nbEffort;
	}
}

