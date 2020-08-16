<html>
  <head> 
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="deleteRow.js" type="text/javascript"></script> 
          <link rel="stylesheet" href="table.css">
	  <form name="form1" action="sqltest.php" method="post">
  </head>
  <?php // sqltest.php
  
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['isbn']))
  {
    $isbn   = get_post($conn, 'isbn');
    $query  = "DELETE FROM classics WHERE isbn='$isbn'";
    $result = $conn-> query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['author'])   &&
      isset($_POST['title'])    &&
      isset($_POST['category']) &&
      isset($_POST['year'])     &&
      isset($_POST['isbn']))
  {
    $author   = get_post($conn, 'author');
    $title    = get_post($conn, 'title');
    $category = get_post($conn, 'category');
    $year     = get_post($conn, 'year');
    $isbn     = get_post($conn, 'isbn');
    $query    = "INSERT INTO classics VALUES" .
      "('$author', '$title', '$category', '$year', NULL, '$isbn')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="sqltest.php" method="post"><pre>
    Author <input type="text" name="author">
     Title <input type="text" name="title">
  Category <input type="text" name="category">
      Year <input type="text" name="year">
      ISBN <input type="text" name="isbn">
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM classics";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  echo <<<_END
  <table style="width:100%">
  <tr>
    <th>Author</th>
    <th>Title</th> 
    <th>Category</th>
    <th>Year</th>
    <th>ID</th>
    <th><input name="checkAll" value="1" type="checkbox" id="checkAll"></th>
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
                    <td><input type="checkbox" name="checkbox" id="checkbox" /></td>
    </tr>

   <?php
  }
  echo <<<_END
     </table>
_END;
?>
   <input type="submit" name="delete" id="delete" onclick="deleteRow()" Value="Delete" /> </form>
<?php
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
?>
  <script>
$("#checkAll").click(function(){
   $('input:checkbox').not(this).prop('checked', this.checked);
});
  </script>
</html>