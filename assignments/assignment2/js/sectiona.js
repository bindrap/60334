function convert() {
			var cad = document.getElementById("cad").value;
			var can = document.getElementById("cad").value;
			can *= 0.75;
			document.getElementById("demo").innerHTML = "$"+cad+" Candian is $"+can+" American.";
}