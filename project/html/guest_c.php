<!DOCTYPE html>
<html>

<head>
	<title>Guest View_C</title>
</head>
<?php // sectiona.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  
  $query  = "SELECT * FROM Resv_Hist ";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
   echo <<<_END
  <table style="width:100%">
  <tr>
    <th>Date</th>
    <th>RmType</th> 
    <th>NumGuest</th>
    <th>Cost</th>
    <th>Additional</th>
  </tr>
_END;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
 ?>
    <tr>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>
    </tr>

   <?php
  }
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

<body style="background-color:powderblue;">
	<h1 style="text-align:left;">Reservation History(Username)</h1>
<p style="text-align:center;"><a href="http://bindrap.myweb.cs.uwindsor.ca/60334/project/html/info.html">For Help Click Here</a></p>
	<p style="text-align:center;"><a href="http://bindrap.myweb.cs.uwindsor.ca/60334/project/html/info.html">For Contact Info Click Here</a></p>
	<img style="text-align:left;" src="marriott.png" alt="hotel" width="400" height="400">

 
</body>
</html>