<!DOCTYPE html>
<html>
	<body>
		<?php 

		function print_square($num){
		   $fin = $num * $num;
		 echo "The square of " .$num." is ".$fin;
		}
		function print_squareroot($num){
		   $fin = sqrt($num);
		   echo "The square root of " .$num. " is " .$fin;
		}

		$number=$_GET["num"];
		$functype = $_GET["functype"];
		switch($functype){
						case 1 : 
							print_square($number);
							break;
						case 2 :
							print_squareroot($number);
							break;
					}


		?>

	</body>
</html>
