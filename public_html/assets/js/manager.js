$(document).ready(function() {
	$("#add-item-price").on("change", function() {
		$(this).val(parseFloat($(this).val()).toFixed(2));
	});

	$('#create-emp-pay').on('change', function(){
    	$(this).val(parseFloat($(this).val()).toFixed(2));
	});

	$("#create-employee-account").on("click", function() {
		let fname  = $("#create-emp-first-name").val();
		let lname  = $("#create-emp-last-name").val();
		let uname  = $("#create-emp-username").val();
		let email  = $("#create-emp-email").val();
		let pass1  = $("#create-emp-password-1").val();
		let pass2  = $("#create-emp-password-2").val();
		let job    = $("#create-emp-job").val();
		let pay   = $("#create-emp-pay").val();
		let rate   = $("#create-emp-pay-rate").val();
		let access = ($("#create-emp-manager").prop("checked")) ? 1 : 0;
		let alert  = $(".create-emp-alert");
		let error  = false;
		let errMsg = "";
		let fields = ["#create-emp-first-name", "#create-emp-last-name", "#create-emp-username", "#create-emp-email", "#create-emp-password-1", "#create-emp-password-2"];

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

		if(job.length < 1) {
			error = true;
			errMsg = "Job title cannot be empty";
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

		if(pay < 0) {
			error = true;
			errMsg = "Invalid wage/salary";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		let options = ["none", "hourly", "weekly", "biweekly", "semimonthly", "monthly", "semiannual", "annual"];

		if(jQuery.inArray(rate, options) == -1) {
			error = true;
			errMsg = "Invalid pay rate";
			alert.addClass("alert-danger");
			alert.html(errMsg);
			alert.removeClass("d-none");
			return;
		}

		if(error == false) {
			$.ajax({
				url: '/delectable/public_html/assets/scripts/restaurant-employee.php',
				type: 'POST',
				data: {
					'emp-first-name': fname,
					'emp-last-name': lname,
					'emp-email': email,
					'emp-username': uname,
					'emp-password-1': pass1,
					'emp-password-2': pass2,
					'emp-manager': access,
					'emp-job': job,
					'emp-pay': pay,
					'emp-pay-rate': rate,
					'loc_id': lid,
					'create-employee-account': true
				}
			}).done(function(res) {
				response = JSON.parse(res);
				resError = response.error;
				console.log(response);
				if(resError == false) {
					data = response.data;
					empId = data.emp_id;
					// Build row to append to employee/manager table
					let row = "<tr>";
					row += "<td>" + fname + " " + lname + "</td>";
					row += "<td>" + uname + "</td>";
					row += "<td><a href='./edit/index.php?eid=" + empId + "' class='text-link table-link'>Profile</a></td>";
					row += "<td><input type='checkbox' name='' disabled='true'></td>";
					row += "</tr>";
					if(access == 0) {
						$("#employee-list tbody").append(row);
					} else {
						$("#manager-list tbody").append(row);
					}
					if(alert.hasClass("alert-danger")) {
						alert.removeClass("alert-danger");
					}
					alert.addClass("alert-success");
					alert.html("Employee account created");
					alert.removeClass("d-none");
					// Clear input fields
					for(let f of fields) {
						$(f).val("");
					}
				} else {
					resErrorMsg = response.error_msg;
					if(alert.hasClass("alert-success")) {
						alert.removeClass("alert-success");
					}
					alert.addClass("alert-danger");
					alert.html(resErrorMsg);
					alert.removeClass("d-none");
				}
			});
		}
	});
});