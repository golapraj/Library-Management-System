<html>
<head>
<link rel="stylesheet" type="text/css" href="css/add_book&user.css">
<script>
    function editBook(str) 
    {
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
        xmlhttp.open("GET","edit_book_process.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
    <form action="#" method="post">
      <select name="book" id="select" onchange="editBook(this.value);">  
          <option disabled selected> Select Book </option>
          <?php
            include "db_connect.php";
            $query = "SELECT * FROM `book`";
            $result = mysql_query($query);
             $serial=1;
            while($row = mysql_fetch_array($result))
            { 
              echo "<option value=".$row['Book_ID'].">"; echo "\"".$row['Tittle']."\" ===> "; echo $row['Author']; echo "</option>";
            }
          ?>
       </select>                 
    </form>
    <div id="txtHint">
    	<?php 
        if(isset($_GET['sts']))
             
  {
    echo '<script type="text/javascript">
          window.onload = function () { alert("Data updated!!"); }
           </script>';
  }

         ?>
    </div>
</body>
</html>
