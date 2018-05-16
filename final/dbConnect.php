<?php
	ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
	$conn = new mysqli("localhost", "root", "1234", "virusdb") or die($conn->error);

	//$sdb = mysql_select_db("virusdb", $conn) or die(mysql_error());
?>