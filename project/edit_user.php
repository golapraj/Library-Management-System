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
<script>
    function showUser() {
      var str = parseInt(document.frm.userroll.value);
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
        xmlhttp.open("GET","edit_user_process.php?q="+str,true);
        xmlhttp.send();
    }
}
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/add_book&user.css">
    <link rel="stylesheet" type="text/css" href="css/search_box.css">
  <script>
    $(document).ready(function(){
    $('input.userroll').typeahead({
        name: 'userroll',
        remote:'search_box_roll.php?key=%QUERY',
        limit : 10
    });
    });
  </script>
</head>
<body>
<div>
<form name="frm" method="post" onsubmit="showUser();return false">
        <input id="roll" name="userroll" class="userroll" placeholder="Enter Roll" type="text" maxlength="7" pattern="[0-9]{7}" title="Number Only" required/><br/>
          <input type="submit" value="OK" />
</form>
</div>
          <?php 
          if(isset($_GET['sts']))
          {
            echo $_GET['sts'];
          echo '<script type="text/javascript">
                    window.onload = function () { alert("Data updated!!"); }
                     </script>';
          }
          ?>
<div id="txtHint"></div>

</body>
</html>