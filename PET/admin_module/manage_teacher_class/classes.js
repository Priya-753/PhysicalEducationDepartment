var class_arr = new Array("B.E Computer Science(I)" , "B.E Computer Science(II)" , "B.E Computer Science(III)" , "B.E Computer Science(IV)" , "B.E Information Technology(I)", "B.E Information Technology(II)", "B.E Information Technology(III)", "B.E Information Technology(IV)", "B.E ECE(I)", "B.E ECE(II)", "B.E ECE(III)", "B.E ECE(IV)", "B.E EEE(I)", "B.E EEE(II)", "B.E EEE(III)", "B.E ECE(IV)");



function classSelect(classElementId){
	var classElement = document.getElementById(classElementId);
	classElement.length=0;
	classElement.options[0] = new Option('Select Class','-1');
	classElement.selectedIndex = 0;
	for (var i=0; i<class_arr.length; i++) {
		classElement.options[classElement.length] = new Option(class_arr[i],class_arr[i]);
	}
}
