<?php
Class utils
{
	public static function generateHash($password)
	{
		$cost = 10;
		//creating a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_RANDOM)), '+', '.');
		//using blowfish algorithm
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		//creating hash from password and salt
		$hash = crypt($password, $salt);
		return $hash;
	}
	
	public static function generateReverseHash($password, $hash)
	{
		return crypt($password, $hash);
	}
	
	public static function unescapeData($bytea)
	{
		return eval("return \"".str_replace('$', '\\$', str_replace('"', '\\"', $bytea))."\";");
	}
	
	public static function validateCC($cc_num, $type) {
		
		if($type == "amex") {
			$pattern = "/^([34|37]{2})([0-9]{13})$/";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}
		} elseif($type == "visa") {
			$pattern = "(4\d{12}(?:\d{3})?)";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}
		} elseif($type == "jcb") {
			$pattern = "(35[2-8][89]\d\d\d{10})";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}
		} elseif($type == "maestro") {
			$pattern = "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}
		} elseif($type == "solo") {
			$pattern = "((?:6334|6767)\d{12}(?:\d\d)?\d?)";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}	
		} elseif($type == "mastercard") {
			$pattern = "(5[1-5]\d{14})";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}	
		} elseif($type == "switch") {
			$pattern = "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)";
			if (preg_match($pattern,$cc_num)) {
				$verified = true;
			} else {
				$verified = false;
			}	
		}	
		return $verified;
	}
}