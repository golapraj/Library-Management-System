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
	$r=mysql_query($query);
	$ts=mysql_num_rows($r);
	//echo $ts;

	$query = "SELECT * FROM `book`";
	$r=mysql_query($query);
	$tb=mysql_num_rows($r);
	//echo $tb;

	$query = "SELECT * FROM `book_group`";
	$r=mysql_query($query);
	$tbg=mysql_num_rows($r);
	//echo $tbg;

	$query = "SELECT * FROM `thesis`";
	$r=mysql_query($query);
	$tt=mysql_num_rows($r);
	//echo $tt;

	$query = "SELECT * FROM `uploads`";
	$r=mysql_query($query);
	$ter=mysql_num_rows($r);
	//echo $ter;

	$query = "SELECT * FROM `group`";
	$r=mysql_query($query);
	$tg=mysql_num_rows($r);
	//echo $tg;

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
	<body style="padding-left:200px;padding-right:200px;padding-top:50px;">
		<div>
			<table class="table table-striped">
				<tr><th>Content</th><th>Total</th></tr>
				<tr><td>Book</td><td><?php echo $tb;?></td></tr>
				<tr><td>Student</td><td><?php echo $ts;?></td></tr>
				<tr><td>Thesis</td><td><?php echo $tt;?></td></tr>
				<tr><td>Group</td><td><?php echo $tg;?></td></tr>
				<tr><td>Rented Books</td><td><?php echo $tbg;?></td></tr>
				<tr><td>e-Resource</td><td><?php echo $ter;?></td></tr>
			</table>
		</div>
	</body>
</html>