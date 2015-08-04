<?php
	session_start();
	include "db_connect.php";
	$query = "SELECT * FROM `student`";
	$result = mysql_query($query);

	if (isset($_POST['submit']))
	{
	   $roll=$_POST['roll'];
	   $sql = "DELETE FROM `rental_library`.`student` WHERE `student`.`Roll` = $roll";
	   $sql2 = "DELETE FROM `rental_library`.`student_group` WHERE `student_group`.`Roll` = $roll";
	    if(mysql_query($sql2))
	    {
	    	//echo "No Problem";
	    	//header("Location:delete_user.php?sts=Delete Successful");
	    }
	    else
	    {
	    	//$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    }
	    if(mysql_query($sql))
	    {
	    	//echo "No Problem";
	    	//header("Location:delete_user.php?sts=Delete Successful");
	    		echo '<script type="text/javascript">
          window.onload = function () { alert("User Deleted!!"); }
          </script>';

	    }
	    else
	    {
	    	//$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    		echo '<script type="text/javascript">
          window.onload = function () { alert("Failed!!"); }
          </script>';
	    }
	}
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/add_book&user_2.css">
		<script src="js/ajax.js"></script>
    <script src="typeahead.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/search_box.css">
    <script>
    $(document).ready(function(){
    $('input.roll').typeahead({
        name: 'roll',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
});
    </script>
	</head>
	<body>
	<form action="delete_user.php" method="post">
		<input type="text" name="roll" placeholder="Enter Roll" class="roll" maxlength="7" required>
		<input name="submit" type="submit" value="Delete" width="100px" onClick="return confirm('Are you sure you want to delete?');">
	</form>
		<div id="txtHint"><b><?php if (isset($_GET['sts'])) {
  echo $_GET['sts'];
} ?></b></div>
	</body>
</html>