var level_arr = new Array("Inter Department" , "Inter College" , "District Level" , "State Level" , "National Level");



function levelSelect(levelElementId){
	var levelElement = document.getElementById(levelElementId);
	levelElement.length=0;
	levelElement.options[0] = new Option('Select Level','-1');
	levelElement.selectedIndex = 0;
	for (var i=0; i<level_arr.length; i++) {
		levelElement.options[levelElement.length] = new Option(level_arr[i],level_arr[i]);
	}
}
