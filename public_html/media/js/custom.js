$(document).ready(function() {
	if(document.referrer != '') {
		$("#create-account-modal").modal('show');
	}

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