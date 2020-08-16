function changepic(){
	var season = document.getElementById("Season");
	var type   = parseInt(season.options[season.selectedIndex].value);
	if(type==1){ document.getElementById("Winter").src = "winter_tree.jpg"; }
	if(type==2){ document.getElementById("Winter").src = "spring_tree.jpg"; }
	if(type==3){ document.getElementById("Winter").src = "summer_tree.jpg"; }
	if(type==4){ document.getElementById("Winter").src = "fall_tree.jpg"; }
}