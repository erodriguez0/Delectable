function is_invalid_name(str) {
	return /[^a-zA-Z\-\d ]/.test(str);
}

function invalid_name(str) {
	return /[^a-zA-Z\d '".&-]/.test(str);
}

function invalid_username(str) {
	return /[^a-zA-Z\d]/.test(str);
}

function valid_email(email) {
    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return re.test(String(email).toLowerCase());
}

function is_invalid_address(str) {
	return /[^a-zA-Z\-\d #,.]/.test(str);
}

function is_invalid_zip(str) {
	return /[^\d\-]/.test(str);
}

function is_invalid_phone(str) {
	return /[^\d\- ()]/.test(str);
}

function is_invalid_text(str) {
	return /[^a-zA-Z\-\d .!]/.test(str);
}

function is_invalid_price(num) {
	return /[^\d\.]/.test(num);
}

function is_valid_price_format(num) {
	return /^\d{0,8}(\.\d{0,2})?$/.test(num);
}

function has_special_char(str) {
	return /[^a-zA-Z\d]/.test(str);
}

function has_letter(str) {
	return /[a-zA-Z]/.test(str);
}

function has_number(str) {
	return /\d/.test(str);
}

function invalid_search(str) {
	return /[^a-zA-Z\d .\-\']/.test(str);
}

function password_check(str) {
	return (has_special_char(str) && has_letter(str) && has_number(str) && str.length >= 8);
}

function populate_state_select(el) {
    // let el = $("#" + div);
    var options = [ 'AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY' ];
    $.each(options, function(k, v) {
        el.append($('<option></option>').val(v).html(v));
    });
}

function selectElement(id, val) {
	let element = $("#" + id);
	element.val(val);
}

function selectStateElement(id, val) {
	let element = $("." + id);
	element.val(val);
}

function formatDate(str) {
	let tmp = new Date(str);
	let date = new Date(tmp.getFullYear(), tmp.getMonth(), tmp.getDate() + 1);
	let day = date.getDate();
	let month = date.getMonth();
	if(day < 10) {
		day = "0" + day;
	}
	if(month < 10) {
		month = "0" + month;
	}
	return month + "-" + day + "-" + date.getFullYear();
}

$(window).on('load', function() {
	$("#cover").hide();
});

$(document).ready(function() {
	if(document.getElementById("NoJS") != null) {
		$("#NoJS").addClass("d-none");
	}

	if(document.getElementsByClassName("state-select") != null) {
		$(".state-select").each(function() {
			populate_state_select($(this));
		});

		if(typeof(state) !== 'undefined') {
			selectStateElement("state-select", state);
		}
	}

	if(document.getElementsByClassName("miles-filter")) {
		if(typeof(miles) !== 'undefined') {
			selectElement("mile-radius", miles);
		}
	}

	if(document.getElementById("sort-restaurants")) {
		if(typeof(sort) !== 'undefined') {
			selectElement("sort-restaurants", sort);
		}
	}

	if(document.getElementsByClassName("res-filter")) {
		if(typeof(res_select) !== 'undefined') {
			if(res_select.length > 0) {
				$.each(res_select, function(k, v) {
					$("input[name='res[]'][value='" + v + "'").prop("checked", true);
				});
			}
		}
	}

	if(document.getElementsByClassName("cat-filter")) {
		if(typeof(cat_select) !== 'undefined') {
			if(cat_select.length > 0) {
				$.each(cat_select, function(k, v) {
					$("input[name='cat[]'][value='" + v + "'").prop("checked", true);
				});
			}
		}
	}

	if(document.getElementsByClassName("rating-filter")) {
		if(typeof(rating) !== 'undefined') {
			$("input[name='rating'][value='" + rating + "']").prop("checked", true);
		}
	}

	if(document.getElementsByClassName("diet-filter")) {
		if(typeof(diet_select) !== 'undefined') {
			if(diet_select.length > 0) {
				$.each(diet_select, function(k, v) {
					$("input[name='diet[]'][value='" + v + "'").prop("checked", true);
				});
			}
		}
	}
});