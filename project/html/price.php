
<html>
	<body style="background-color:powderblue;">
		<?php 
			$guestno=$_GET["guestno"];
			echo "The price of room with number of guests specified is ";
			if((int)$guestno < 2 ){
                echo "$100";
			}
			else if((int)$guestno < 3 ){
				echo "$150";
			}
		
		?>

	</body>
</html>
