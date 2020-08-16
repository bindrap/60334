function deleteRow(){
	var id = document.getElementById("checkbox").checked; 			//array
	var i;
	

	var con = mysql.createConnection({
	  host: "localhost",
	  user: "bindrap",
	  password: "Windsor2015%",
	  database: "publications"
	});

	for(i=0 ; i< id.length ; i++){
		con.connect(function(err) {
		  if (err) throw err;
		  var sql = "DELETE FROM classics WHERE id = "+i;
		  con.query(sql, function (err, result) {
			if (err) throw err;
			console.log("Number of records deleted: " + result.affectedRows);
		  });
		});
	}
}