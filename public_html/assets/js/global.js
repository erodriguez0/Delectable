function has_special_char(str) {
	return /[^a-zA-Z\d]/.test(str);
}

function has_letter(str) {
	return /[a-zA-Z]/.test(str);
}

function has_number(str) {
	return /\d/.test(str);
}

function password_check(str) {
	return (has_special_char(str) && has_letter(str) && has_number(str) && str.length >= 8);
}