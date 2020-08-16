<html>
  <head> 
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <?php // test.php
  
	  require_once 'login.php';
	  $conn = new mysqli($hn, $un, $pw, $db);
	  if ($conn->connect_error) die($conn->connect_error);
	  
	  $fiction  ="SELECT COUNT('Fiction') FROM classics;";
	  $play = "SELECT COUNT('Play') FROM classics;";
	  $nonfiction = "SELECT COUNT('Non-Fiction') FROM classics;";
	  $fict = $conn->query($fiction);
	  $pla = $conn->query($play);
	  $nonfict = $conn->query($nonfiction);
	  if (!$fict) die ("Database access failed: " . $conn->error);
	  ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Genre', 'Number of Books'],
          ['Fiction',     <?php echo (int)$fict; ?>],
          ['Non-Fiction',      <?php echo (int)$nonfict; ?>],
          ['Plays',  <?php echo (int)$pla; ?>]
        ]);

        var options = {
          title: 'Book Genres'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
  <?php
  $fict->close();
  $nonfict->close();
  $pla->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
?>
</html>