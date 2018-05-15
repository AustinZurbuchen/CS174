<?php
$loginForm = <<<HTML
	<table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
		<th colspan="2" align="center">Signup Form</th>
		<form method="post" action="userValidate.php" onsubmit="return validate(this)">
			<tr><td>Username</td>
				<td><input type="text" maxlength="16" name="username"></td></tr>
			<tr><td>Password</td>
				<td><input type="text" maxlength="12" name="password"></td></tr>
			<tr><td>Email</td>
				<td><input type="text" maxlength="64" name="email"></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value="Signup"></td></tr>
		</form>
	</table>
HTML;
$fileUpload = <<<HTML
	<html>
	<head>
	<title>Malware Tester!</title>
	</head>
	<body>
		<h2>Enter a file you want to test:</h2>
		<form action="hw4PHPForm.php" method="post" enctype="multipart/form-data">
			File: <br>
			<input type="file" name="file" id="file" value=""/>
			<br><br>
			<input type="submit" value="Submit">
	</form>
	</body>
	</html>
	<button type="button" onclick="document.getElementById("loginForm").innerHTML = $loginForm;">Login as admin</button>
	<p id="loginForm"></p>
HTML;
	echo $fileUpload;
?>