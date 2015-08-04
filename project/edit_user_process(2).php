 <?php
 session_start();
    include "db_connect.php";
     $roll=$_SESSION['q'];
    if(isset($_POST['change']))
    {
        $nname=$_POST['nname'];
        $nmobile=$_POST['nmobile'];
        $nemail=$_POST['nemail'];
        $naddress=$_POST['useraddress'];
        
        if(mysql_query("UPDATE `student` SET `Name`='$nname',`Mobile`='$nmobile',`Email`='$nemail',`Address`='$naddress' WHERE `Roll`='$roll'"))
        {
            header("Location:edit_user.php?sts=Data Updated");
        }
     }

     if (isset($_POST['reset'])) 
     {
        if(mysql_query("UPDATE `student` SET `Password`='1234' WHERE `Roll`='$roll'"))
        {
            header("Location:edit_user.php?sts=Password reset");
        }
     }
  ?>