<html>
<head>
	<title>Fake Midterm</title>
</head>
</html>
<body>
	<?php
		$shape = $_POST["string"];
		$num1 = (int)$_POST["num1"];
		$num2 = (int)$_POST["num2"];

		$array = associativeArray();
		echo shapeArea($shape, $num1, $num2);
		echo "<br>";
		echo $array["array"][0];
		echo "<br>";
		echo $array["bool"];
		echo "<br>";
		function shapeArea($shape, $len, $width){
			if(is_numeric($len) && is_numeric($width)){
				if($shape == "rectangle"){
					return $len * $width;
				} elseif ($shape == "parallelogram"){
					return $len * $width;
				} elseif ($shape == "kite"){
					return ($len * $width) / 2;
				} elseif ($shape == "circle"){
					$pi = 3.141592;
					return ($len * $len) * $pi;
				} else {
					echo "ERROR string is not a correct shape!";
					return 0;
				}
			} else {
				echo "ERROR one or both of the numbers is not a number!";
				return 0;
			}
		}

		function associativeArray(){
			$array = array('array' => array(5, 6),
							'bool' => true);
			return $array;
		}
	?>
</body>