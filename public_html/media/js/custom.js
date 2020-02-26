$(document).ready(function() {
	if(document.referrer != '') {
		// $("#create-account-modal").modal('show');
	}

	$("#emp-table-search").keyup(function() {
        var value = $(this).val().toLowerCase().trim();

        $("table").children().find("tr").each(function(index) {
            var name = $(this).find("td").first().text().toLowerCase().trim();
            var uname = $(this).find("td").first().next().text().toLowerCase().trim();
            var email = $(this).find("td").first().next().next().text().toLowerCase().trim();
            var status = $(this).find("td").first().next().next().next().text().toLowerCase().trim();
            $(this).toggle(name.indexOf(value) !== -1 || uname.indexOf(value) !== -1
            	|| email.indexOf(value) !== -1 || status.indexOf(value) !== -1);
        });
    });

    $(".emp-profile-modal-btn").each(function() {
    	$(this).click(function() {
    		var eid = $(this).attr("name");
    		$.ajax({
    			url: '/delectable/public_html/media/scripts/employee-edit.php',
				type: 'POST',
				data: {
					'eid': eid,
					'employee_profile': true
				}
    		}).done(function(res) {
    			var emp = JSON.parse(res);
    			var address1 = "";
    			var phone = "";
    			var workplace = "";
    			var work_address = "";
    			var work_phone = "";
    			var status = "";
    			
    			if(emp['emp_phone'] == null) {
    				phone = "N/A";
    			} else {
    				phone = emp['emp_phone'];
    			}

    			if(emp['loc_phone'] == null) {
    				work_phone = "N/A";
    			} else {
    				work_phone = emp['loc_phone'];
    			}

    			if(emp['res_name'] == null) {
    				workplace = "N/A";
    			} else {
    				workplace = emp['res_name'];
    			}

    			if(emp['emp_status'] == 1) {
    				status = "Active";
    			} else {
    				status = "Suspended";
    			}

    			if(emp['emp_address_1'] == null || emp['emp_address_2'] == null
	    				|| emp['emp_city'] == null || emp['emp_state'] == null
	    				|| emp['emp_postal_code'] == null) {
    				address1 = "N/A";
    			} else {
	    			address1 = emp['emp_address_1'] + ' ' + emp['emp_address_2']
	    				+ ' ' + emp['emp_city'] + ' ' + emp['emp_state'] + ' '
	    				+ emp['emp_postal_code'];
    			}

    			if(emp['loc_address_1'] == null || emp['loc_address_2'] == null
	    				|| emp['loc_city'] == null || emp['loc_state'] == null
	    				|| emp['loc_postal_code'] == null) {
    				work_address = "N/A";
    			} else {
	    			work_address = emp['loc_address_1'] + ' ' + emp['loc_address_2']
	    				+ ' ' + emp['loc_city'] + ' ' + emp['loc_state'] + ' '
	    				+ emp['loc_postal_code'];
    			}

    			$("#profile-name").html(emp['emp_first_name'] + ' ' + emp['emp_last_name']);
    			$("#profile-username").html(emp['emp_username']);
    			$("#profile-email").html(emp['emp_email']);
    			$("#profile-phone").html(phone);
    			$("#profile-address").html(address1);
    			$("#profile-status").html(status);
    			$("#profile-registered").html(emp['emp_created']);
    			$("#profile-login").html(emp['emp_last_login']);
    			$("#profile-workplace").html(workplace);
    			$("#profile-work-phone").html(work_phone);
    			$("#profile-work-address").html(work_address);
    		});
    	});
    });

    $("#res-table-search").keyup(function() {
        var value = $(this).val().toLowerCase().trim();

        $("table").children().find("tr").each(function(index) {
            var name = $(this).find("td").first().text().toLowerCase().trim();
            var address = $(this).find("td").first().next().text().toLowerCase().trim();
            $(this).toggle(name.indexOf(value) !== -1 || address.indexOf(value) !== -1);
        });
    });

	$("#res-update-btn").click(function(e) {
		e.preventDefault();
		var name = $("#res-name").val();
		var slogan = $("#res-slogan").val();
		var desc = $("#res-desc").val();

		$.ajax({
			url: '/delectable/public_html/media/scripts/restaurant-edit.php',
			type: 'POST',
			data: {
				'name': name,
				'slogan': slogan,
				'desc': desc,
				'rid': rid,
				'res_update': true
			}
		}).done(function() {
			$(".res-update-alert").removeClass("d-none");
		});
	});

	$(".loc-update-btn").click(function(e) {
		e.preventDefault();
		var add1 = $("[name='loc-address-1']").val();
		var add2 = $("[name='loc-address-2']").val();
		var phone = $("[name='loc-phone']").val();
		var city = $("[name='loc-city']").val();
		var state = $("[name='loc-state']").val();
		var zip = $("[name='loc-postal-code']").val();
		
		$.ajax({
			url: '/delectable/public_html/media/scripts/restaurant-edit.php',
			type: 'POST',
			data: {
				'lid': lid,
				'add1': add1,
				'add2': add2,
				'phone': phone,
				'city': city,
				'state': state,
				'zip': zip,
				'loc_update': true
			}
		}).done(function() {
			$(".loc-update-alert").removeClass("d-none");
		});
	});

	// Search for employees by username
	$(".emp-search-btn").click(function(e) {
		e.preventDefault();
		var input = $("#emp-search").val();

		$.ajax({
			url: '/delectable/public_html/media/scripts/restaurant-edit.php',
			type: 'POST',
			data: {'employee_search': input}
		}).done(function(res) {
			$("#emp-table tbody").empty();
			var par = JSON.parse(res);
			$.each(par, function(k, v) {
				var row = '<tr><td>' + v.emp_first_name + ' ' + v.emp_last_name + '</td>'
					+ '<td>' + v.emp_username + '</td>'
					+ '<td><input type="checkbox" class="form-check-input mx-auto emp-check" value="' 
					+ v.emp_id + '"></td></tr>';
				$("#emp-table tbody").append(row);
			});
		});
	});

	// Update selected employee to have manager access
	$(".save-manager-btn").click(function(e) {
		e.preventDefault();
		var eid = $(".emp-check").val();
		$.ajax({
			url: '/delectable/public_html/media/scripts/restaurant-edit.php',
			type: 'POST',
			data: {
				'add_manager': true,
				'emp_id': eid, 
				'loc_id': lid
			}
		}).done(function() {
			$("#emp-table tbody").empty();
			// $("#list-modal").modal('hide');
			location.reload();
		});
	});


	$(".remove-manager-btn").each(function() {
		$(this).click(function(e) {
			e.preventDefault();
			var eid = $(this).val();
			var row = $(this).parent().parent();
			var man_table = $("#emp-table tbody");
			var table = $("#emp-list tbody");
			$.ajax({
				url: '/delectable/public_html/media/scripts/restaurant-edit.php',
				type: 'POST',
				data: {'remove_manager': eid}
			}).done(function() {
				table.append(row);
				man_table.remove(row);
			});
		});
	});
});