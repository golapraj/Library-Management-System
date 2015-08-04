
<?php
    include "db_connect.php";
	$query = "SELECT * FROM `book`";
	$result = mysql_query($query);
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

		
		<script>
		function showHint(str) {
		   
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		            }
		        }
		        xmlhttp.open("GET", "all_books_process.php?q=" + str, true);
		        xmlhttp.send();
		   
		}
</script>
	</head>
	<body style="padding:20px;">
	 <form name="frm" method="post">
	    	<div style="padding-left:250px;padding-right:250px;padding-bottom:0px;padding-top:30px;" class="input-group">			
					<input type="text" class="form-control" onkeyup="showHint(this.value)" placeholder = "Search for books">
					<span class="input-group-btn ">
				    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
				    </span>
			</div>

	 </form>
	    <div id="txtHint" >
		<table class="table table-striped">
			<tr><th>Sl.</th> <th>Book ID</th> <th>Tittle</th> <th>Author</th> <th>Price</th><th>Category</th></tr>
				<?php 
				    $serial=1;
					while($row = mysql_fetch_array($result))
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
