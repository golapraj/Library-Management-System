<?php
  session_start();
  include "db_connect.php";
  $query = "SELECT * FROM `student`";
  $result = mysql_query($query);

  if (isset($_POST['submit']))
  {
     $id=$_POST['gi'];
     $sql = "DELETE FROM `rental_library`.`group` WHERE `group`.`ID` = '$id'";
     if(mysql_query($sql))
      {
       // echo "string hi";
              $sql1 = "DELETE FROM `rental_library`.`book_group` WHERE `book_group`.`Group_ID` = '$id'";
         if(mysql_query($sql1))
          {
            //header("Location:delete_group.php?sts=Delete Successful");
          }
          else
          {
            $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
            //echo $errx;
          }
         $sql2 = "DELETE FROM `rental_library`.`student_group` WHERE `student_group`.`Group_ID` = '$id'";
          if(mysql_query($sql2))
          {
            //header("Location:delete_group.php?sts=Delete Successful");
          }
          else
          {
            $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
           // echo $errx;
          }
            //header("Location:delete_group.php?sts=Delete Successful");
            echo '<script type="text/javascript">
          window.onload = function () { alert("Group Deleted!!"); }
          </script>';
      }
      else
      {
       /* $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
        echo $errx;*/
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
    $('input.gi').typeahead({
        name: 'gi',
        remote:'search_box_gi.php?key=%QUERY',
        limit : 10
    });
});
    </script>
  </head>
  <body>
  <form action="delete_group.php" method="post">
    <input type="text" name="gi" class="gi" placeholder="Enter Group ID" maxlength="7" required>
    <input name="submit" type="submit" value="Delete" width="100px" onClick="return confirm('Are you sure you want to delete?');">
  </form>
   <div id="txtHint"><b><?php if (isset($_GET['sts'])) {
  //echo $_GET['sts'];
} ?></b></div>
  </body>
</html>