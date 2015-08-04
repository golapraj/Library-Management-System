<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) {
            header("Location:index.php");
            die();
        }
?>
<?php
    include "db_connect.php";
    $query = "SELECT * FROM `student`";
	
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
    function info(str) {
    	
   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open("GET","all_students_process.php?q="+str,true);
        xmlhttp.send();
   
}

</script>
	</head>
	<body style="padding:20px;">
	    <form name="frm" method="post">
	        
              <div style="padding-left:250px;padding-right:250px;padding-bottom:0px;padding-top:30px;" class="input-group">			
					<input type="text" class="form-control" onkeyup="info(this.value);" placeholder = "Enter name or roll">
					<span class="input-group-btn ">
						<button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
					</span>
				</div>


	    </form>
	    <div id="txtHint">
	   	<table class="table table-striped">
	   	<tr><th>Serial</th><th>Roll</th> <th>Name</th> <th>Mobile No.</th> <th>Email</th> <th>Address</th><th>Group ID</th></tr>
	   	<?php
			    $serial=1;
				while($row = mysql_fetch_array($result))
				{ 
						$query1 = "SELECT max(Group_ID) AS Group_ID FROM `student_group`  WHERE `Roll`= '$row[Roll]'";
						$result1 = mysql_query($query1);
			         	$group_id =  mysql_fetch_array($result1);
					    echo "<tr><td>". $serial."</td><td>". $row['Roll'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Mobile'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Address'] . "</td><td>".$group_id['Group_ID']."</td></tr>";
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
