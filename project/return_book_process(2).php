<?php
include "db_connect.php";
if(isset($_POST['submit']))
{
		if(($_POST['bn'])!='0')
		 {
			if(($_POST['nb'])!='0')
			{
				$sql1 = "SELECT * FROM `book_group` WHERE `Book_ID`='$_POST[bn]'";
				$result1=mysql_query($sql1);
				$quant=mysql_fetch_array($result1);
				
				if($quant['Quantity']==$_POST['nb'])
				{
                   $sql2 = "DELETE FROM `book_group` WHERE `Book_ID`='$_POST[bn]'";
				    if(mysql_query($sql2))
				    {
				    	//echo "delete";
				    	//header("Location:delete_book.php?sts=Delete Successful");
				    	echo '<script type="text/javascript">
                                window.onload = function () { alert("Data Updated!!"); }
                                </script>';
				    }
				    else
				    {
				    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
				    	echo $errx;
				    }
				}
				else
				{
					if ($quant['Quantity']>$_POST['nb']) 
					{
						$qun=$quant['Quantity'] - $_POST['nb'];
						 $up="UPDATE `book_group` SET `Quantity`='$qun' WHERE `Book_ID`='$_POST[bn]'";
						 mysql_query($up);
						//echo "Updated";
						echo '<script type="text/javascript">
                                window.onload = function () { alert("Data Updated!!"); }
                                </script>';
                        //header("Location:return_book.php");
					}
					else
					{
						//echo "Wrong Data submission!";
						echo '<script type="text/javascript">
                                window.onload = function () { alert("You cannot return book more than you rent!!"); }
                                </script>';
                                 //header("Location:return_book.php");
					}
					
				}
			}
			else
			{
				echo "<b>Please Select no. of Book.</b>";
			}
		 }
	   else
		{
		echo "<b>Please Select Book.</b>";
		}
}
?>