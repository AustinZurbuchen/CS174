<!DOCTYPE html>
<html>
<body>

<?php
	function validate_username($field){
		if($field == "") return "No username was entered<br>";
		else if (strlen($field) < 6)
			return "Usernames must be at least 6 characters<br>";
		else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
			return "Only letters, numbers, - and _ in usernames<br>";
		return ""; 
	}

	function validate_password($field){
		if ($field == "") return "No password was entered<br>";
		else if(strlen($field) < 6)
			return "Passwords must be at lease 6 characters<br>";
		else if(!preg_match("/[a-z]/", $field) ||
				!preg_match("/[a-z]/", $field) ||
				!preg_match("/[0-9]/", $field))
			return "Passwords require 1 of each a-z, A-Z, and 0-9";
		return "";
	}

	function validate_email($field){
		if($field == "") return "No email was entered<br>";
		else if(!((strpos($field, ".") > 0) &&
				  (strpos($field, "@") > 0) ||
				  preg_match("/[^a-zA-Z0-9.@_-]/", $field)))
			return "The Email address is invalid<br>";
		return "";
	}

	function fix_string($string){
		if(get_magic_quotes_gpc()) $string = stripslashes($string);
		return htmlentities($string);
	}

	if(isset($_POST['username']))
		$username = fix_string($_POST['username']);
	if(isset($_POST['password']))
		$password = fix_string($_POST['passwprd']);
	if(isset($_POST['email']))
		$email = fix_string($_POST['email']);

	$fail = validate_username($username);
	$fail .= validate_password($password);
	$fail .= validate_email($email);

	echo "<!DOCTYPE html>\n<html><head><title>Signup Form</title>";

	if($fail == ""){
		echo "</head><body>Form data successfully validated: $username, $password, $email.</body></html>";
		exit;
	}
	echo <<<_END;
?>

</body>
</html>