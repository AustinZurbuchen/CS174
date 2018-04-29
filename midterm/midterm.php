<html>
<head>
	<title>Midterm</title>
</head>
</html>
<body>
	<?php
		function question5(){
			$array = array('numbers' => array(1, 5, 6),
						'string' => "Test String");
		}

		function question4(){
			$color = array ( "color" => array ( "a" => "Red", "b" => "Green", "c" => "White"),
							"numbers" => array ( 1, 2, 3, 4, 5, 6 ), 
							"holes" => array ( "First", 5 => "Second", "Third"));
			echo $color["holes"][5];
			echo " ";
			echo $color["color"]["a"];
		}
		//question4();

		function question3($array){
			$arrayKeys = array_keys($array);
			$shuffledArray = array();
			for($i = sizeof($arrayKeys) - 1; $i >= 0; $i--){
				$shuffledArray[$arrayKeys[$i]] = $array[$arrayKeys[$i]];	
			}
			print_r($shuffledArray);
		}
		// $array = array('numbers' => "15, 16",
		// 				'string' => "Test String");
		// print_r($array);
		// echo "<br><br><br><br>";
		// question3($array);
		
		function isPrime($num){
			if(is_numeric($num) && $num > 1){
				for($i = 2; $i < $num; $i++){
					if($num % $i == 0){
						return 0;
					}
				}
				return 1;
			} else {
				echo "Not a valid input!";
			}
		}
		// echo isPrime(7);
		// echo "<br>";
		// echo isPrime("String");
		// echo "<br>";
		// echo isPrime(12);
		// echo "<br>";
		// echo isPrime(-3);

		function question1($array){
			$a = array();
			$b = array();
			for($i = 0; $i < 7; $i++){
				$x = $array["X"][$i];
				$y = $array["Y"][$i];
				if($x == 0){
					$curA = 0;
					$curB = $y;	
				} else {
					if($y < 0){
						$curA = ceil((-$y) / $x);
						$curB = $x % (-$y);	
					} elseif($x < 0){
						$curA = floor($y / (-$x));
						$curB = (-$x) % $y;
					} else {
						$curA = floor($y / $x);
						$curB = $x % $y;
					}
				}
				$a["A"][$i] = $curA;
				$b["B"][$i] = $curB;
			}
			print_r($a);
			echo "<br>";
			print_r($b);
		}
		$array = array("X" => array(-6, -4, -2, 0, 2, 4, 6),
						"Y" => array(-18.5, -12.5, -6.5, -0.5, 5.5, 11.5, 17.5));
		question1($array);
	?>
</body>