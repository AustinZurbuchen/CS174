<html>
<head>
	<title>A quick test</title>
</head>
<body>
<?php //test.php
	$connection = connect();
	echo "connection successfull <br>";
	echo "People: <br>";
	printTable($connection);
	unConnect($connection);
	function connect(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "1234";
		$db = "testing";

		$connect = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $connect -> error);

		return $connect;
	}

	function printTable($connection){
		$query = "SELECT * FROM people";
		$result = $connection->query($query);

		#if(msqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()){
				echo "First Name: " . $row["firstname"] . " | Last Name: " . $row["lastname"] . " | Gender: " . $row["gender"] . " | age: " . $row["age"];
				echo "<br>";
			}
		#}
	}

	function unConnect($connect){
		$connect -> close();
	}
?>
</body>
</html>