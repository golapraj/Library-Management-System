<?php
include "db_connect.php";
date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['ok']))
{
	$q1= "SELECT * FROM `book` WHERE `Tittle`='$_POST[bn]'";
	$r1=mysql_query($q1);
	$row1 = mysql_num_rows($r1);
	$rw1=mysql_fetch_array($r1);
	

	$query = "SELECT `ID` FROM `group` WHERE `ID`='$_POST[gi]'";
    $result = mysql_query($query);  
    $row2 = mysql_num_rows($result);

    $sql="SELECT `Book_ID` FROM `book_group` WHERE `Book_ID`='$rw1[Book_ID]' AND `Group_ID`='$_POST[gi]'";
    $r3=mysql_query($sql);
    $row3 = mysql_num_rows($r3);
    
    if($row1=='1'&&$row2=='1'&&$row3!='1')
    {
	$cTime=gmdate("D, d M Y H:i:s A");
	$d=strtotime("+6 Months");
	$rTime=date("D, d M Y", $d);
	$tk=$rw1['Price']*'0.30'*$_POST['snofb'];
	$sql1= "INSERT INTO `book_group` (`Group_ID`, `Book_ID`, `Rent_Time`, `Return_Time`, `Quantity`) VALUES ('$_POST[gi]','$rw1[Book_ID]','$cTime','$rTime','$_POST[snofb]')";
    mysql_query($sql1);
    //echo "Rent Successfull Pay TK ".$tk;
    header("Location:rent_book.php?sts=$tk");
    }
    else
    {
    	echo "SOMETHING ERROR";
    }
}

?>