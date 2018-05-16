<?php

function alert($msg){
	echo '<script type = "text/javascript">alert("'.$msg.'");</script>';
}

function extractFileSignature($file){
	$extInfo = pathinfo($file);
	if($extInfo["extension"] == ""){
		alert("Please upload a file to be scanned!");
	} else {
		$fileOpen = fopen($file, "rb");
		$size = filesize($file);
		$contents = fread($fileOpen, $size);
		fclose($fileOpen);
		$bitStorage = "";

		if($size >= 20){
			for($i = 0; $i < 20; $i++){
				$char = $contents[$i];
				$baseTen = ord($char);
				$bin = base_convert($baseTen, 10, 2);
				$hex = base_convert($bin, 2, 16);
				$bitStorage .= $hex;
			}
			return $bitStorage;
		} else {
			for($i = 0; $i < $size; $i++){
				$char = $contents[$i];
				$baseTen = ord($char);
				$bin = base_convert($baseTen, 10, 2);
				$hex = base_convert($bin, 2, 16);
				$bitStorage .= $hex;
			}
			return $bitStorage;
		}
	}
}

function extractTestFileSignature($file){
	$extInfo = pathinfo($file);
	if($extInfo["extension"] == ""){
		alert("Please upload a file to be scanned!");
	} else {
		$fileOpen = fopen($file, "rb");
		$size = filesize($file);
		$contents = fread($fileOpen, $size);
		fclose($fileOpen);
		$bitStorage = "";
		for($i = 0; $i < $size; $i++){
			$char = $contents[$i];
			$baseTen = ord($char);
			$bin = base_convert($baseTen, 10, 2);
			$hex = base_convert($bin, 2, 16);
			$bitStorage .= $hex;
		}
		return $bitStorage;
	}
}

?>