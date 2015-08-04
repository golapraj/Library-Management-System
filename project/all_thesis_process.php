<?php
 include "db_connect.php";
$search_text = urldecode(filter_var(trim($_GET['q']))); // $_POST['q'] is the search string which user types. It is sent via ajax  
$q = "SELECT * FROM `thesis` WHERE `Roll1` LIKE '{$search_text}%' OR `Roll2` LIKE '{$search_text}%' OR `Roll3` LIKE '{$search_text}%' OR `Roll4` LIKE '{$search_text}%' OR `Name1` LIKE '{$search_text}%'";    
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
	<body style="padding:10px;">
	    <div id="txtHint">
		<table class="table table-striped">
		 <col width="3">
         <col width="100">
         <col width="">
         <col width="100">
         <col width="250">
         <col width="70">
         <col width="200">
         <col width="100">
		<tr><th>Sl.</th> <th>Thesis No</th> <th>Thesis Tittle</th> <th>Roll No</th> <th>Name</th> <th>Category</th> <th>Supervisor Name</th> <th>Remarks</th></tr>

			<?php 
			     $serial=1;
				while($row = mysql_fetch_array($r))
				{ 
					if(($row['Roll3']=='0')&&($row['Roll4']=='0')) 
					{
						echo "<tr><td>$serial</td><td>" . $row['Thesis_No'] . "</td><td>" . $row['Thesis_Tittle'] . "</td><td>" . $row['Roll1']."<br/>" .$row['Roll2']."</td><td>" . $row['Name1'] ."<br/>".$row['Name2']."</td><td>".$row['Thesis_Category']."</td><td>" . $row['Supervisor_Name'] . "</td><td>" . $row['Remarks'] . "</td></tr>";
						    $serial++;
					}
					elseif ($row['Roll4']=='0') 
					{
						echo "<tr><td>$serial</td><td>" . $row['Thesis_No'] . "</td><td>" . $row['Thesis_Tittle'] . "</td><td>" . $row['Roll1']."<br/>" .$row['Roll2']."<br/>" .$row['Roll3']."<br/>" ."</td><td>" . $row['Name1'] ."<br/>".$row['Name2']."<br/>".$row['Name3']."</td><td>".$row['Thesis_Category']."</td><td>" . $row['Supervisor_Name'] . "</td><td>" . $row['Remarks'] . "</td></tr>";
						    $serial++;
					}
					elseif ($row['Roll3']=='0') 
					{
						echo "<tr><td>$serial</td><td>" . $row['Thesis_No'] . "</td><td>" . $row['Thesis_Tittle'] . "</td><td>" . $row['Roll1']."<br/>" .$row['Roll2']."<br/>" .$row['Roll3']."<br/>" ."</td><td>" . $row['Name1'] ."<br/>".$row['Name2']."<br/>".$row['Name3']."</td><td>".$row['Thesis_Category']."</td><td>" . $row['Supervisor_Name'] . "</td><td>" . $row['Remarks'] . "</td></tr>";
						    $serial++;
					}
					else
					{
						echo "<tr><td>$serial</td><td>" . $row['Thesis_No'] . "</td><td>" . $row['Thesis_Tittle'] . "</td><td>" . $row['Roll1']."<br/>" .$row['Roll2']."<br/>" .$row['Roll3']."<br/>" .$row['Roll4']. "</td><td>" . $row['Name1'] ."<br/>".$row['Name2']."<br/>".$row['Name3']."<br/>".$row['Name4']."</td><td>".$row['Thesis_Category']."</td><td>" . $row['Supervisor_Name'] . "</td><td>" . $row['Remarks'] . "</td></tr>";
						    $serial++;
					
					}
				}
			?>

		</table>
		</div>
	</body>
</html>

<?php 
  mysql_close();
?>
