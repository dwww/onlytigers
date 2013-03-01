<?php

class Fib{
	
	public function getNumbers($n){
		
		$a = 0;
		$b = 1;
		
		$ffib = array();
		
		for ($i=1; $i<=$n; $i++){
			$c = $b;
			$b = $a + $b;
			$a = $c;
			$ffib[$i] = $a;
		}
		return $ffib;
	}
	
}