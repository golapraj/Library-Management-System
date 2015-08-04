<?php
include "db_connect.php";
	  if(mysql_query("UPDATE `thesis` SET `Thesis_No`='$_POST[pn]' , `Thesis_Tittle`='$_POST[pt]' , `Roll1`='$_POST[roll1]' , `Name1`='$_POST[name1]' , `Roll2`='$_POST[roll2]' , `Name2`='$_POST[name2]' , `Roll3`='$_POST[roll3]' , `Name3`='$_POST[name3]' , `Roll4`='$_POST[roll4]' , `Name4`='$_POST[name4]' ,`Thesis_Category`='$_POST[thesiscategory]' , `Supervisor_Name`='$_POST[sn]' , `Remarks`='$_POST[rmk]' WHERE `Thesis_No`='$_POST[id]'"))
       {
        header("Location:edit_thesis.php?sts=Data Updated");
       }
       else
       {
          header("Location:edit_thesis.php?sts=Data Update Failed!");
       }
?>