function validate_search() {
	let term = $("#search-restaurants").val();
	if(term == null || term.length < 1 || invalid_search(term)) {
		return false;
	}
	return true;
}

$(document).ready(function() {
	// $("#search-restaurants-btn").click(function() {
	// 	let term = $("#search-restaurants").val();
	// 	if(term != null && term.length > 0 && !invalid_search(term)) {

	// 	}
	// });

	$("#search-restaurants").keyup(function(event) {
		if(event.keyCode === 13) {
			$("#search-restaurants-btn").click();
		}
	});

	// if(modal) {
	// 	$("#create-account-modal").modal('show');
	// }
	$("#add-customer-btn").on('click', function() {
		let customer = [];
		let fields = ["add-customer-first-name", "add-customer-last-name", 
			"add-customer-username", "add-customer-email", "add-customer-password-1",
			"add-customer-password-2"];
		customer.push($("#add-customer-first-name").val());
		customer.push($("#add-customer-last-name").val());
		customer.push($("#add-customer-username").val());
		customer.push($("#add-customer-email").val());
		customer.push($("#add-customer-password-1").val());
		customer.push($("#add-customer-password-2").val());
		let error_msg = "";
		let tmp = false;
		$.each(customer, function(k, v) {
			tmp = false;
			// Empty fields
			if(v == null || v.length == 0) {
				tmp = true;
			}

			// Illegal chars in first and last name
			if((k == 0 || k == 1) && (invalid_name(v) || v.length > 32)) {
				tmp = true;
			}

			// Username not alphanumeric
			if(k == 2 && (invalid_username(v) || v.length < 8 || v.length > 32)) {
				tmp = true;
			}

			// Email validation
			if(k == 3 && !valid_email(v)) {
				tmp = true;
			}

			// Password is 8-32 chars and passwords are the same
			if(k == 4 && (customer[k+1] != v || v.length < 8 || v.length > 32)) {
				tmp = true;
			}

			if(k == 5 && (customer[k-1] != v || v.length < 8 || v.length > 32)) {
				tmp = true;
			}

			// Show red border around inputs with errors
			if(tmp == true) {
				$("#" + fields[k]).addClass("border-danger");
				$(".signup-alert").removeClass("alert-success");
				$(".signup-alert").addClass("alert-danger");
				$(".signup-alert").html("Invalid/Empty value(s)");
				$(".signup-alert").removeClass("d-none");
			} else {
				$("#" + fields[k]).removeClass("border-danger");
			}
		});

		if(!tmp) {
			$.ajax({
				url: '/delectable/public_html/assets/scripts/customer-login.php',
				type: 'POST',
				data: {
					'customer_signup': true,
					'first_name': customer[0],
					'last_name': customer[1],
					'username': customer[2],
					'email': customer[3],
					'password_1': customer[4],
					'password_2': customer[5]
				}
			}).done(function(response) {
				let res = JSON.parse(response);
				if(!res.error) {
					location.href = '../';
				} else {
					$(".signup-alert").html(res.error_msg);
					$(".signup-alert").removeClass("d-none");
				}
			});
		}
	});

	$("#customer-login-btn").on('click', function() {
		let uname = $("#customer-username").val();
		let passw = $("#customer-password").val();
		let tmp = false;

		if(uname == null || uname.length < 8 || uname.length > 32 || invalid_username(uname)) {
			$("#customer-username").addClass("border-danger");
			$(".login-alert").html("Invalid username");
			$(".login-alert").removeClass("d-none");
			tmp = true;
			return;
		} else {
			$("#customer-username").removeClass("border-danger");
		}

		if(passw == null || passw.length < 8 || passw.length > 32) {
			$("#customer-password").addClass("border-danger");
			$(".login-alert").html("Invalid password");
			$(".login-alert").removeClass("d-none");
			tmp = true;
			return;
		} else {
			$("#customer-password").removeClass("border-danger");
		}

		if(tmp == false) {
			$.ajax({
				url: '/delectable/public_html/assets/scripts/customer-login.php',
				type: 'POST',
				data: {'customer_login': true, 'username': uname, 'password': passw}
			}).done(function(response) {
				res = JSON.parse(response);
				if(!res.error) {
					// location.reload();
					location.href = '../';
				} else {
					$(".login-alert").html(res.error_msg);
					$(".login-alert").removeClass("d-none");
					if(res.field.length > 0) {
						$(res.field).addClass("border-danger");
					}
				}
			})
		}
	});

	var usStates = [
		{ name: 'ALABAMA'},
		{ name: 'ALASKA'},
		{ name: 'AMERICAN SAMOA'},
		{ name: 'ARIZONA'},
		{ name: 'ARKANSAS'},
		{ name: 'CALIFORNIA'},
		{ name: 'COLORADO'},
		{ name: 'CONNECTICUT'},
		{ name: 'DELAWARE'},
		{ name: 'DISTRICT OF COLUMBIA'},
		{ name: 'FEDERATED STATES OF MICRONESIA'},
		{ name: 'FLORIDA'},
		{ name: 'GEORGIA'},
		{ name: 'GUAM'},
		{ name: 'HAWAII'},
		{ name: 'IDAHO'},
		{ name: 'ILLINOIS'},
		{ name: 'INDIANA'},
		{ name: 'IOWA'},
		{ name: 'KANSAS'},
		{ name: 'KENTUCKY'},
		{ name: 'LOUISIANA'},
		{ name: 'MAINE'},
		{ name: 'MARSHALL ISLANDS'},
		{ name: 'MARYLAND'},
		{ name: 'MASSACHUSETTS'},
		{ name: 'MICHIGAN'},
		{ name: 'MINNESOTA'},
		{ name: 'MISSISSIPPI'},
		{ name: 'MISSOURI'},
		{ name: 'MONTANA'},
		{ name: 'NEBRASKA'},
		{ name: 'NEVADA'},
		{ name: 'NEW HAMPSHIRE'},
		{ name: 'NEW JERSEY'},
		{ name: 'NEW MEXICO'},
		{ name: 'NEW YORK'},
		{ name: 'NORTH CAROLINA'},
		{ name: 'NORTH DAKOTA'},
		{ name: 'NORTHERN MARIANA ISLANDS'},
		{ name: 'OHIO'},
		{ name: 'OKLAHOMA'},
		{ name: 'OREGON'},
		{ name: 'PALAU'},
		{ name: 'PENNSYLVANIA'},
		{ name: 'PUERTO RICO'},
		{ name: 'RHODE ISLAND'},
		{ name: 'SOUTH CAROLINA'},
		{ name: 'SOUTH DAKOTA'},
		{ name: 'TENNESSEE'},
		{ name: 'TEXAS'},
		{ name: 'UTAH'},
		{ name: 'VERMONT'},
		{ name: 'VIRGIN ISLANDS'},
		{ name: 'VIRGINIA'},
		{ name: 'WASHINGTON'},
		{ name: 'WEST VIRGINIA'},
		{ name: 'WISCONSIN'},
		{ name: 'WYOMING' }
	];

	if(document.getElementById("state") !== null) {
		for(var i = 0;i<usStates.length;i++){
			var option = document.createElement("option");
			option.text = usStates[i].name;
			option.value = i;
			var select = document.getElementById("state");
			select.appendChild(option);
		}
	}
});
