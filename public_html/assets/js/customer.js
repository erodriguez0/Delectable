$(document).ready(function() {
	// if(modal) {
	// 	$("#create-account-modal").modal('show');
	// }

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


for(var i = 0;i<usStates.length;i++){
	var option = document.createElement("option");
	option.text = usStates[i].name;
	option.value = i;
	var select = document.getElementById("state");
	select.appendChild(option);
}
