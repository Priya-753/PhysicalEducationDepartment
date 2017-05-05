
var sport_arr = new Array("Atheletics" , "Badminton", "Basketball", "Cricket", "Football", "Throwball", "Volleyball");

// States
var t_a = new Array();
t_a[0]="";
t_a[1]="Discus|Hurdles|Javelin|Shot Put"
t_a[2]="Badminton Racket|Shuttlecock|Net";
t_a[3]="Basketball|Basketball Hoop";
t_a[4]="Ball|Bat|Stumps|Bails";
t_a[5]="Football";
t_a[6]="Throwball|Net";
t_a[7]="Volleyball|Net";

function sportEquip( sportElementId, typeElementId ){

	var selectedSportIndex = document.getElementById( sportElementId ).selectedIndex;

	var typeElement = document.getElementById( typeElementId );

	typeElement.length=0;	// Fixed by Julian Woods
	typeElement.options[0] = new Option('Select Type','');
	typeElement.selectedIndex = 0;

	var type_arr = t_a[selectedSportIndex].split("|");

	for (var i=0; i<type_arr.length; i++) {
		typeElement.options[typeElement.length] = new Option(type_arr[i],type_arr[i]);
	}
}

function findSport(sportElementId, typeElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var sportElement = document.getElementById(sportElementId);
	sportElement.length=0;
	sportElement.options[0] = new Option('Select Sport','-1');
	sportElement.selectedIndex = 0;
	for (var i=0; i<sport_arr.length; i++) {
		sportElement.options[sportElement.length] = new Option(sport_arr[i],sport_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the states.

	if( typeElementId ){
		sportElement.onchange = function(){
			sportEquip( sportElementId, typeElementId );
		};
	}
}

function statusFind(statusElementId)
{
	var statusElement = document.getElementById(statusElementId);
	statusElement.length=0;
	statusElement.options[0]= new Option('Select Availabilty','-1');
	statusElement.selectedIndex = 0;
	for (var i=0; i<stat_arr.length; i++) {
		statusElement.options[statusElement.length] = new Option(stat_arr[i],stat_arr[i]);
	}
}
