var status_arr = new Array("Yes","No");



function availabilitySelect(statusElementId){
	var statusElement = document.getElementById(statusElementId);
	statusElement.length=0;
	statusElement.options[0] = new Option('Select Availabilty','-1');
	statusElement.selectedIndex = 0;
	for (var i=0; i<status_arr.length; i++) {
		statusElement.options[statusElement.length] = new Option(status_arr[i],status_arr[i]);
	}
}
