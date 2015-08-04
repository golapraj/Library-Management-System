<?php
    include "db_connect.php";
    $search_text = urldecode(filter_var(trim($_GET['q'])));
	$query = "SELECT * FROM `student` WHERE `Roll` LIKE '{$search_text}%' OR `Name` LIKE '%{$search_text}%'";  
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

	</head>
	<body style="padding:20px;">
	   
	    <div id="txtHint">
	   	<table class="table table-striped">
	   	<tr><th>Serial</th><th>Roll</th> <th>Name</th> <th>Mobile No.</th> <th>Email</th> <th>Address</th><th>Group ID</th> <th>Password</th> </tr>
	   	<?php
			    $serial=1;
				while($row = mysql_fetch_array($result))
				{ 
						$query1 = "SELECT max(Group_ID) AS Group_ID FROM `student_group`  WHERE `Roll`= '$row[Roll]'";
						$result1 = mysql_query($query1);
			         	$group_id =  mysql_fetch_array($result1);
					    echo "<tr><td>". $serial."</td><td>". $row['Roll'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Mobile'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Address'] . "</td><td>".$group_id['Group_ID']."</td><td>". $row['Password'] . "</td></tr>";
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
