<?php
session_start();
if (isset($_GET['q'])) 
{
$q = intval($_GET['q']);
$_SESSION['q']=$q;
include "db_connect.php";
$sql="SELECT * FROM `book_group` WHERE `Group_ID` = '".$q."'";
$result = mysql_query($sql);
}
?>
<html>
<body>
	<form method="post" action="return_book_process(2).php">
	<fieldset>
	<legend style="background:#00803E">Group ID:<?php echo $q; ?></legend>
	 <select name="bn">
	 <option value="0" selected>Select Book</option>>
	<?php
	while($row = mysql_fetch_array($result))
    {
    $sql1="SELECT * FROM `book` WHERE `Book_ID`=$row[Book_ID]"; 
    $result1 = mysql_query($sql1);
    $nm=mysql_fetch_array($result1)
    ?>
    	<option value="<?php echo $nm['Book_ID']; ?>"> <?php echo $nm['Tittle']; ?> </option>
   <?php } ?>
	</select>
	<select name="nb">
	  <option value="0" selected>Select no. of Book</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	</select>
	
	<input type="submit" name="submit" value="submit">
    </fieldset>
	</form>
</body>
</html>