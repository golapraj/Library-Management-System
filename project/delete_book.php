<?php
	session_start();
	include "db_connect.php";

	if (isset($_POST['submit']))
	{
	   $title=$_POST['dbn'];


    
	    $sql3="SELECT * FROM `book` WHERE `Tittle`='$title'";
	    $r= mysql_query($sql3);

	    $bim=mysql_fetch_array($r);
	    $id=$bim['Book_ID'];
	    //echo "string".$id;

	   $sql2 = "DELETE FROM `rental_library`.`book_group` WHERE `book_group`.`Book_ID`='$id'";
	    if(mysql_query($sql2))
	    {
	    	//echo "No Problem";
	    	//header("Location:delete_book.php?sts=Delete Successful");
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    }



	
	    $sql = "DELETE FROM `rental_library`.`book` WHERE `book`.`Tittle` = '$title'";
	    if(mysql_query($sql))
	    {
	    	//echo "No Problem";
	    	//header("Location:delete_book.php?sts=Delete Successful");
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Book Deleted!!"); }
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
    $('input.dbn').typeahead({
        name: 'dbn',
        remote:'search_box_bn.php?key=%QUERY',
        limit : 10
    });
});
    </script>
	</head>
	<body>
	<form action="delete_book.php" method="post">
		<input type="text" name="dbn" class="dbn" placeholder="Enter Book Name" maxlength="7" required>
		<input name="submit" type="submit" value="Delete" width="100px" onClick="return confirm('Are you sure you want to delete?');">
	</form>
		<div id="txtHint"><b><?php if (isset($_GET['sts'])) {
  //echo $_GET['sts'];
} ?></b></div>
	</body>
</html>