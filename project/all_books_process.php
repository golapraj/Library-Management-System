<?php
 include "db_connect.php";
$search_text = urldecode(filter_var(trim($_GET['q']))); // $_POST['q'] is the search string which user types. It is sent via ajax  

$q = "SELECT * FROM `book` WHERE `Tittle` LIKE '%{$search_text}%' OR `Author` LIKE '%{$search_text}%'";  
$r = mysql_query($q); 
?>
<html> 
	<head> 
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">

	</head>
	<body style="padding:20px;">
	    <div id="txtHint" >
		<table class="table table-striped">
			<tr><th>Sl.</th> <th>Book ID</th> <th>Tittle</th> <th>Author</th> <th>Price</th><th>Category</th></tr>
				<?php 
				    $serial=1;
					while($row = mysql_fetch_array($r))
					{ 
						echo "<tr><td>$serial</td><td>" . $row['Book_ID'] . "</td><td>" . $row['Tittle'] . "</td><td>" . $row['Author'] . "</td><td>". "$".$row['Price']."</td><td>".$row['Category']."</td></tr>";
					    $serial++;
					}
				?>
		 </table>
		</div> 
	</body>
</html>

<?php 
  mysql_close();
?>
