$(document).ready(function() {
	$("#add-item-price").on("change", function() {
		$(this).val(parseFloat($(this).val()).toFixed(2));
	});
});