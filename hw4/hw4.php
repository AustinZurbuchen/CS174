<!DOCTYPE html>
<html>
<body>

<?php
	$num = $_POST["number"];
	if ($num < 1){
		echo "<h2>ERROR!</h2><br>";
		echo "The number you entered is less than 1 <br>";
		echo "Enter a number greater than or equal to 1 <b>";
	} else {
		echo "For n = " . $num . ", index is " . indexOfFibNDigits($num) . "!";
	}

	function indexOfFibNDigits($n){
		if ($n == 1){
			return $n;
		} else {
			$prev = 1;
			$secPrev = 1;
			$index = 3;
			$fibVal = 0;
			//$break = false;
			while(true){
				$fibVal = $prev + $secPrev;
				//echo "index is $index | fibVal is $fibVal <br>";
				$fibValLen = strlen((string)$fibVal);
				if($fibValLen == $n){
					return $index;
				} else {
					$secPrev = $prev;
					$prev = $fibVal;
					$index++;
				}
			}
		}
	}
?> 

</body>
</html>