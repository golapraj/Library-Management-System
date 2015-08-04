<?php
    session_start();
    include "db_connect.php";
    $query = "SELECT * FROM `student`";
    $result = mysql_query($query);
      if (isset($_POST['roll'])) {
          $roll=$_POST['roll'];
      while($row = mysql_fetch_array($result))
        { 
          if ($row['Roll']==$roll) 
          {
            $name=$row['Name'];
            $mobile=$row['Mobile'];
            $address=$row['Address'];
            $email=$row['Email'];
          }
        }
      }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/add_book&user.css">
<script>
    function showGroup() {
      var str = parseInt(document.frm.gid.value);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","return_book_process.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script src="js/ajax.js"></script>
    <script src="js/typeahead.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/search_box.css">
  <script>
    $(document).ready(function(){
    $('input.gid').typeahead({
        name: 'gid',
        remote:'search_box_gi.php?key=%QUERY',
        limit : 10
    });
    });
  </script>
</head>
<body>
<form name="frm" method="post" onsubmit="showGroup();return false">
        <input id="roll" name="gid" class="gid" placeholder="Enter Group ID" type="text" maxlength="7" pattern="[0-9]*" title="Number Only" />
          <input type="submit" value="OK" />
      </form>
<br>
<div id="txtHint"><b><?php if (isset($_GET['sts'])) {
  echo $_GET['sts'];
} ?></b></div>

</body>
</html>