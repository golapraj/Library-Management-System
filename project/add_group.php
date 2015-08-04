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
	$result = mysql_query($query);
	$result1 = mysql_query($query);
	$result2 = mysql_query($query);
	$result3 = mysql_query($query);
	$result4 = mysql_query($query);
	
	if (isset($_POST['Group'])) 
	{
		if ((isset($_POST['sesn']))&&(isset($_POST['term']))&&((isset($_POST['roll1']))||(isset($_POST['roll2']))||(isset($_POST['roll3']))))
		{
			      $sesn=$_POST['sesn'];
            $term=$_POST['term'];
            $roll1=$_POST['roll1'];
            $roll2=$_POST['roll2'];
            $roll3=$_POST['roll3'];
            $roll4=$_POST['roll4'];
            $roll5=$_POST['roll5'];
            
            if($roll4&&$roll5)
            {
            $arr = array($roll1,$roll2,$roll3,$roll4,$roll5);
            }
            elseif ($roll5) 
            {
            $arr = array($roll1,$roll2,$roll3,$roll5);
            }
            elseif ($roll4) 
            {
            $arr = array($roll1,$roll2,$roll3,$roll4);
            }
            else
            {
              $arr = array($roll1,$roll2,$roll3);
            }

            $arr2 = array_unique($arr);
            if(count($arr) != count($arr2))
            {
                $chk=false;
            }
            else
            {
                $chk=true;
            }

         $spl="SELECT * FROM `student_group` WHERE (`Roll`='$roll1' OR `Roll`='$roll2' OR `Roll`='$roll3' OR `Roll`='$roll4' OR `Roll`='$roll5') AND `Sesn`='$sesn' AND `Term`='$term'";
         $rst=mysql_query($spl);
         $rn=mysql_num_rows($rst);
         
         if($rn>0)
           $chkd=false;
         else
            $chkd=true;
         
         if($chk&&$chkd)     //error checking
         {
            $sql = "INSERT INTO `group` () VALUES()";
             if(mysql_query($sql))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
                        
              }

            $result = mysql_query("SELECT * FROM `group`") or die('Invalid query: ' . mysql_error());
            mysql_data_seek($result , (mysql_num_rows($result)-1));
            $row_last =  mysql_fetch_array($result);
            $last = $row_last['ID'];

            $sql1= "INSERT INTO `student_group`(`Group_ID`, `Roll`, `Sesn`, `Term`) VALUES ('$last','$roll1','$sesn','$term')";
            $sql2= "INSERT INTO `student_group`(`Group_ID`, `Roll`, `Sesn`, `Term`) VALUES ('$last','$roll2','$sesn','$term')";
            $sql3= "INSERT INTO `student_group`(`Group_ID`, `Roll`, `Sesn`, `Term`) VALUES ('$last','$roll3','$sesn','$term')";
            $sql4= "INSERT INTO `student_group`(`Group_ID`, `Roll`, `Sesn`, `Term`) VALUES ('$last','$roll4','$sesn','$term')";
            $sql5= "INSERT INTO `student_group`(`Group_ID`, `Roll`, `Sesn`, `Term`) VALUES ('$last','$roll5','$sesn','$term')";
            
            if($roll1)
             if(mysql_query($sql1))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
              }

              if(mysql_query($sql2))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
              }

               if(mysql_query($sql3))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
              }

              if($roll4){
               if(mysql_query($sql4))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
              }}

              if($roll5){
               if(mysql_query($sql5))
               {
                        //echo "No Problem";
               }
             else
              {
                        $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                        //echo $errx;
              }}
              echo '<script type="text/javascript">
          window.onload = function () { alert("Group Created!!"); }
            </script>';
       }
       else
       {
         echo '<script type="text/javascript">
                                window.onload = function () { alert("Mission Failed!!\n one or more member may be in another group\n or same roll"); }
                                </script>';       
        }
		}
	}
  
?>


<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/add_book&user.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="typeahead.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/search_box.css">
  <script>
    $(document).ready(function(){
    $('input.roll1').typeahead({
        name: 'roll1',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
     $('input.roll2').typeahead({
        name: 'roll2',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
      $('input.roll3').typeahead({
        name: 'roll3',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
       $('input.roll4').typeahead({
        name: 'roll4',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
        $('input.roll5').typeahead({
        name: 'roll5',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
    });
  </script>


<STYLE TYPE="text/css">
       
input:focus{
         background:#fff;
        border:2px solid #330066;
    background-repeat:no-repeat;
     }
  
   
 
 input:focus:invalid {
         background-image: url('images/redx.png');
         background-position:right;
         background-repeat:no-repeat;
         -moz-box-shadow:none;
     }
  
    
      input:required:valid {
        background-image: url('images/greenx.png');
        background-position:right;
        background-repeat:no-repeat;
        -moz-box-shadow:none;
     }
   
    
   .help {
    display:none;
    font-size:90%;
}
    
  input:focus + .help {
    display:inline-block;
}
 
</STYLE>


</head>
<body style="padding:20px;">
<div>
     	<form action="add_group.php" method="post">
			  <fieldset>
    <legend style="background:#3AA949;text-align:center;color:#fff">Add Group</legend>
					            <input type="text" name="roll1" class="roll1" placeholder="Enter Roll" maxlength="7" pattern="[0-9]{7}" title="e.g 1207005" required><br/>
                      <input type="text" name="roll2" class="roll2" placeholder="Enter Roll" maxlength="7" pattern="[0-9]{7}" title="e.g 1207005" required><br/>
                      <input type="text" name="roll3" class="roll3" placeholder="Enter Roll" maxlength="7" pattern="[0-9]{7}" title="e.g 1207005" required><br/>
                      <input type="text" name="roll4" class="roll4" placeholder="Enter Roll" maxlength="7" pattern="[0-9]{7}" title="e.g 1207005" ><br/>
                      <input type="text" name="roll5" class="roll5"placeholder="Enter Roll" maxlength="7" pattern="[0-9]{7}" title="e.g 1207005" ><br/>
                      <select name="sesn" required>
                            <option value="" disabled> Select Session </option>
                            <option>2012-2013</option>
                            <option>2013-2014</option>
                            <option>2014-2015</option>
                            <option>2015-2016</option>
                            <option>2016-2017</option>
                            <option>2017-2018</option>
                            <option>2018-2019</option>
                            <option>2019-2020</option>
                     </select><br/>
                      <select name="term" required>
                            <option value="" disabled> Select Term </option>
                            <option>1st</option>
                            <option>2nd</option>
                     </select><br/>
				    <input style="margin-left:300px;" name="Group" type="submit" value="OK">
			  </fieldset>
			</form>
	    </div>
</body>
</html>