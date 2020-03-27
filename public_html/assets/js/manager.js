$(document).ready(function() {
	$("#add-item-price").on("change", function() {
		$(this).val(parseFloat($(this).val()).toFixed(2));
	});

	$("#create-employee-account").on("click", function() {
		let fname = $("#create-emp-first-name").val();
		let lname = $("#create-emp-last-name").val();
		let uname = $("#create-emp-username").val();
		let email = $("#create-emp-email").val();
		let pass1 = $("#create-emp-password-1").val();
		let pass2 = $("#create-emp-password-2").val();
		let access = ($("#create-emp-manager").prop("checked")) ? 1 : 0;
		let alert = $(".create-emp-alert");
		let error = false;
		let errMsg = "";

		// Fields cannot be left empty
		if(fname.length < 1 || lname.length < 1) {
			error = true;
			errMsg = "Name cannot be empty";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		if(email.length < 1) {
			error = true;
			errMsg = "Email cannot be empty";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		if(uname.length < 1) {
			error = true;
			errMsg = "Username cannot be empty";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		// Name/Username alphanumeric
		if(has_special_char(fname) || has_special_char(lname) || has_special_char(uname)) {
			error = true;
			errMsg = "Name/Username must be alphanumeric";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		// Passwords don't match
		if(pass1 != pass2) {
			error = true;
			errMsg = "Passwords don't match";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		// Password validation
		if(!password_check(pass1)) {
			error = true;
			errMsg = "Password must contain at least 1 special char. and be at least 8 chars. long";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		if(error == false) {
			$.ajax({
				
			}).done(function(res) {
				
			});
		}
	});
});