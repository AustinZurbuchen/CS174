<?php

require_once("dbConnect.php");
include("functions.php");
session_start();

if(!isset($_SESSION["rootuser"])){
	header("Location: index.php");
	exit();
}

if(isset($_POST["submitManualFileSignature"]) != ""){
	$manualFileSignature = $_POST["manualFileSignature"];
	$virusType = $_POST["manualVirusType"];

	$query = "INSERT INTO virustable (id, type, filesignature, threatdetect) VALUES (NULL, '".mysqli_escape_string($conn, $virusType)."', '".mysqli_escape_string($conn, $manualFileSignature)."', 'Yes')";
	$result = $conn->query($query);

	if($result){
		alert("File Signature was successfully uploaded to the database!");
	} else {
		alert("File ulpoad failed!");
	}
}

if(isset($_POST["submit"]) != ""){
	$name = $_FILES["file"]["name"];
	$size = $_FILES["file"]["size"];
	$type = $_FILES["file"]["type"];
	$temp = $_FILES["file"]["tmp_name"];
	$virusType = $_POST["manualVirusType2"];

	if(isset($name)){
		if(!empty($name)){
			//fileArchiveCreator();
			$location = "";
			if(move_uploaded_file($temp, $location.$name)){
				$hashSigAdmin = extractFileSignature($name);

				$query = "INSERT INTO virustable (id, type, filesignature, threatdetect) VALUES (NULL, '".mysqli_escape_string($conn, $virusType)."', '".mysqli_escape_string($conn, $hashSigAdmin)."', 'Yes')";
				$result = $conn->query($query);

				if($result){
					alert("Success - your file is scanning!");
					alert("File signature has been uploaded to the database: ".$hashSigAdmin);
					//rename("$name", "fileArchives/$name");
				} else {
					alert("Failed to upload the file signature.");
				}
			}
		}
	}
}
?>

<script>
	function validateMalware(form){
		var malwareNameVal = form.manualVirusType.value;
		var malwareNameVal2 = form.manualVirusType2.value;

		if(/[^a-zA-Z0-9]/.test(malwareNameVal)){
			alert("Name of malware can only be letters or numbers, no special characters.");
			return false;
		} else if(/[^a-zA-z0-9]/.test(malewareNameVal2)){
			alert("Name of malware can only be letters or numbers, no special characters.");
		}
	}
</script>

<html>
	<head>
		<title>Virus Scanner - Admin Panel</title>
	</head>
	<h3>Welcome, Administrator! </h3>
	<div align="right">
		<a href="logout.php"> Log out </a>
	</div>
	<form action="RootPanel.php" method="post" enctype="multipart/form-data" name="malwareForm" onsubmit="return validateMalware(this)">
	<center><p>Paste Signature Here:</p></center>
	<center><input type="text" name="manualFileSignature" required size="90" maxlength="="65000"></center>
	<center><i>Enter Malware Type: </i>
	<input type="text" name="manualVirusType" name="submitManualFileSignature"></center>
	<center> <input type="submit" value="submit" name="submitManualFileSignature"></center>
	<br>
	</form>
	<center> OR </center>
	<br>
	<form action="RootPanel.php" method="post" name="malewareForm2" enctype="multipart/form-data" onsubmit="return validateMalware(this)">
	<center> <p>Upload file below:</p></center>
		<div>
			<center><input type="file" name="file" required id="file"></center>
			<center> <i>Enter Malware Type: </i>
			<input type="text" name="manualVirusType2" required size="10" maxlength="20"></center>
			<center><input type="submit" value="Scan File!" name="submit"></center>
			<br>
		</div>
	</form>
</html>