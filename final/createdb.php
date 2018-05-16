<?php

$db = "localhost";
$username = "root";
$password = "1234";
$dbname = "virusdb";

$conn = new mysqli($db, $username, $password, $dbname) or die($conn->error);

//$sdb = mysql_select_db($dbname, $conn) or die(mysql_error());

$dropQuery = "DROP TABLE IF EXISTS admintable;";
$query = "CREATE TABLE IF NOT EXISTS admintable (
		username varchar(20) NOT NULL,
		password varchar(128) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

if($conn->query($dropQuery) === TRUE && $conn->query($query) === TRUE){
	echo "Admin Table created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$dropQuery = "DROP TABLE IF EXISTS virustable;";
$query = "CREATE TABLE IF NOT EXISTS virustable (
		id int(11) NOT NULL AUTO_INCREMENT,
		type varchar(20) NOT NULL,
		filesignature varchar(65495) NOT NULL,
		threatdetect varchar(10) NOT NULL,
		PRIMARY KEY (id)
		) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;";

if($conn->query($dropQuery) === TRUE && $conn->query($query) === TRUE){
	echo "Admin Table created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();

?>