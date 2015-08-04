<?php
        session_start();
        if ( !isset($_SESSION['login_admin'])) {
            header("Location:index.php");
            die();
        }
?>
<?php
    include "db_connect.php";
	$query = "SELECT * FROM `thesis`";
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
    function thesis(str) {
     
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
        xmlhttp.open("GET","all_thesis_process.php?q="+str,true);
        xmlhttp.send();
}
</script>
	</head>
	<body style="padding:10px;">
	<form name="frm" method="post">
           
            <div style="padding-left:250px;padding-right:250px;padding-bottom:0px;padding-top:30px;" class="input-group">			
					<input type="text" class="form-control" onkeyup="thesis(this.value);" placeholder = "Search for Students">
					<span class="input-group-btn ">
						<button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
					</span>
				</div>

	 </form>
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
				while($row = mysql_fetch_array($result))
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
