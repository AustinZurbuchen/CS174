<?php

require_once("dbConnect.php");
include("functions.php");

session_start();

if(ISSET($_SESSION["rootuser"])){
	header("Location: RootPanel.php");
	exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$userPost = $_POST["username"];
	$userLowercase = strtolower($userPost);
	$user = mysqli_escape_string($conn, $userLowercase);
	$pass = mysqli_escape_string($conn, $_POST["password"]);
	$pass = hash("sha512", $pass);

	$query = $conn->query("SELECT * FROM admintable WHERE username = '$user' and password = '$pass'") or die("Failed: " . $conn->error);
	$row = mysqli_fetch_array($query);

	if($row["username"] == $user && $row["password"] == $pass){
		$_SESSION["rootuser"] = $user;
		header("Location: RootPanel.php");
		exit();
	} else {
		alert("Invalid credentials, try again!");
	}
}
$conn->close();
?>

<html>
<head>
	<title>Virus Scanner - Admin Login</title>
</head>
<center><form action="" method="post" name="loginForm">
	<h4>Admin Login</h4>
		<input type="text" name="username" placeholder="username" required="true"/>
		<input type="password" name="password" placeholder="password" required="true"/>
		<button name="submit" value="Login" type="submit">Login</button>
</form></center>
<div align="center">
	<b><a href="index.php"><p>Back!</p></a></b>
</div>
</html>