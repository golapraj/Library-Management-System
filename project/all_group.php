<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) {
            header("Location:index.php");
            die();
        }
?>
<?php
    //session_start();
    include "db_connect.php";
	
	$query = "SELECT * FROM `group`";
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
	<body style="padding:10px;">
		<?php while($group_id =  mysql_fetch_array($result)){ 



			?>
		<div id="table" >
			<table class="table table-striped">
			<?php
			      $quer1 = "SELECT * FROM `student_group` WHERE `Group_ID`='$group_id[ID]'";
					$resul1 = mysql_query($quer1);
					$rw1=mysql_fetch_array($resul1);
            ?>
			    <tr style="background:#3AA949;"><th></th><th></th><th>Group ID: <?php echo $group_id['ID']; ?></th><th>Session: <?php echo $rw1['Sesn']; ?></th><th>Term: <?php echo $rw1['Term']; ?></th><th></th></lebel></tr>
				<tr style="background:white;"><th>Member Roll</th><th>Member Name</th><th>Rented Book</th><th>Quantity</th><th>Rent Date</th><th>Last Date of Return</th></tr>
                   <?php
               

					$query1 = "SELECT * FROM `student_group` WHERE `Group_ID`='$group_id[ID]'";
					$result1 = mysql_query($query1);
					$query2 = "SELECT * FROM `book_group` WHERE `Group_ID`='$group_id[ID]'";
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

					   echo "<tr><td>"; echo $row1['Roll'];echo "</td><td>"; echo $name['Name'];echo "</td><td>"; echo $name2['Tittle'];echo"<br/> <small>";echo $name2['Author'];echo"</small>";echo "</td><td>";echo $row2['Quantity'];echo "</td><td>";echo $row2['Rent_Time'];echo"</td><td>"; echo$row2['Return_Time'] ; echo"</td></tr>";
						}
						else{
							break;
						}
						
					}
      
				?>
			</table>
			<?php } ?>
		</div>
	</body>
</html>