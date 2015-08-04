<?php
        session_start();
		if ( !isset($_SESSION['login_user'])) 
        {
			header("Location:index.php");
			die();
		}
?>
<?php
    //session_start();
    include "db_connect.php";
	
	$query = "SELECT max(Group_ID) AS Group_ID FROM `student_group`  WHERE `Roll`= '$_SESSION[login_user]'";
	$result = mysql_query($query);
	$group_id =  mysql_fetch_array($result);
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
		
		<div id="table">
			<table class="table table-striped">
			    <tr class="info"><th>Group Id:<?php echo $group_id['Group_ID']; ?></th></tr>
				<tr class="success"><th>Member Roll</th><th>Member Name</th><th>Rented Book</th><th>Rent Date</th><th>Last Date of Return</th></tr>
				<?php
               

					$query1 = "SELECT * FROM `student_group` WHERE `Group_ID`='$group_id[Group_ID]'";
					$result1 = mysql_query($query1);
					$query2 = "SELECT * FROM `book_group` WHERE `Group_ID`='$group_id[Group_ID]'";
		            $result2 = mysql_query($query2);


					while (true)
					{
						$row1=mysql_fetch_array($result1);
						$row2=mysql_fetch_array($result2);
						if(($row1||$row2))
						{
							$query3 = "SELECT * FROM `student` WHERE `Roll`='$row1[Roll]'";
						$result3 = mysql_query($query3);
						$name=  mysql_fetch_array($result3);

						$query4 = "SELECT * FROM `book` WHERE `Book_ID`='$row2[Book_ID]'";
						$result4 = mysql_query($query4);
						$name2=  mysql_fetch_array($result4);

					   echo "<tr><td>"; echo $row1['Roll'];echo "</td><td>"; echo $name['Name'];echo "</td><td>"; echo $name2['Tittle'];echo"<br/> <small>";echo $name2['Author'];echo"</small>";echo "</td><td>";echo $row2['Rent_Time'];echo"</td><td>"; echo$row2['Return_Time'] ; echo"</td></tr>";
						}
						else{
							break;
						}
						
					}
      
				?>
			</table>
		</div>
	</body>
</html>