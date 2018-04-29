<!DOCTYPE html>
<html>
<body>

<?php
	function squareRoot($num){
		if(is_numeric($num) && $num >= 0){
			return sqrt($num);
		} else {
			return 0;
		}
	}

	function mySQLFunction(){
		$conn = new mysqli($hn, $un, $pw, $db);
		if($conn->connect_error) die($coon->connect_error);

		$query = "SELECT * FROM classics";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
	}

	function tester(){
		// SquareRoot tester
		echo "input: 4, expected: 2, actual: " . squareRoot(4) . "<br>";
		echo "input: 'time', expected: 0, actual: " . squareRoot("time") . "<br>";
		echo "input: -156, expected: 0, actual: " . squareRoot(-156) . "<br>";
		echo "input: 16.16, expected: 4.01995..., actual: " . squareRoot(16.16) . "<br>";
		// End squareRoot tester
		// MySQLFunction tester
		mySQLFunction();
		// Emd MySQLFunction tester
	}
	tester();
?>

</body>
</html>