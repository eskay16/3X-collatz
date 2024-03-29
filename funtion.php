<?php

class collOOP {
	public $highNum = 0;
	public $colArr = array();
	public $rangeArr = array();
	
	public function sequencGen($num){
        $result = array();
        
        while($num != 1){
			if ($num % 2 == 0)
                $num = $num / 2;
            else {
                $num = ($num * 3) + 1;
            }
			$result[] = $num;
		}
		
		$this->colArr = $result;
        return $this->colArr;
    }
	
	public function highestFind($sequence){
        $high = 0;
        for ($i = 0; $i < count($sequence); $i++) {
            if ($high < $sequence[$i]) {
                $high = $sequence[$i];
            }
        }
		$this->highNum = $high;
        return $this->highNum;
    }
	
	public function calculate_range($min, $max){
		$table = array();
		for($a = $min; $a <= $max; $a++){
			$result = $test = $a;
			$i = 0;
			while ($result != 1){
				if ($result % 2 == 0)
					$result = $result / 2;
				else {
					$result = ($result * 3) + 1;
				}
				$i++;
				if ($result > $test) {
					$test = $result;
				}
			}
			
			$table[] = array(
				"number" => $a,
				"highest_number" => $test,
				"iteration" => $i
			);
		}
		$this->rangeArr = $table;
		return $this->rangeArr;
	}
	
	public function arithmeticProgress($min, $max){
		$Arithmeth = array();
		$value=$min;
		while ($value <= $max) {
  
        $value *= 3; 
		if($value <= $max){
			array_push($Arithmeth, $value);
		}
		
    }
	return $Arithmeth;
	}
}
	
class myHistogram extends collOOP{
	public function showHist($arr){
		$arrCount = array_count_values($arr);
		
		return $arrCount;
	}
}
?>