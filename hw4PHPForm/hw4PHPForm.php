<!DOCTYPE html>
<html>
<body>

<?php
	if($_FILES["file"]["type"] == "text/plain"){
		$fp = fopen($_FILES["file"]["name"], "rb");
		while(($data = fgetcsv($fp, 1000, " ")) !== false){
			foreach($data as $word){
				if(is_numeric($word)){
					echo "$word ";
				}
			}
		}
	} else {
		die("Not a Text File");
	}
?> 

</body>
</html>