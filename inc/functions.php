<?php
// Does string contain letters
function has_letter($string) {
    return preg_match( '/[a-zA-Z]/', $string );
}

// Does string contain numbers
function has_number($string) {
    return preg_match( '/\d/', $string );
}

// Does string contain special characters
function has_special_char($string) {
    return preg_match('/[^a-zA-Z\d]/', $string);
}

// Check if password contains number, 
// letter, special char, and length
function password_check($pass = '') {
	if(!has_number($pass) || !has_letter($pass) || !has_special_char($pass) || strlen($pass) < 8) { return false; }

	return true;
}

?>