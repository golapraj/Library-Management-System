<?php
include "db_connect.php";
	  if(mysql_query("UPDATE `book` SET `Tittle`='$_POST[booktittle]',`Author`='$_POST[bookauthor]',`Category`='$_POST[bookcategory]',`Price`='$_POST[bookprice]' WHERE `Book_ID`='$_POST[id]'"))
       {
        header("Location:edit_books.php?sts=Data Updated");
       }
?>