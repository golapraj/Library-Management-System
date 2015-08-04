<html>
  <head>
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/add_book&user_2.css">
    <link rel="stylesheet" href="css/search_box.css">
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search_box_th.php?key=%QUERY',
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
  <body>
        <div id="form">
        <form name="frm" onsubmit="thesis();return false;">
        <input type="text" name="th" class="typeahead tt-query" placeholder="Enter Thesis No." required><br/>
        <input type="submit" value="Enter" />
        </form>
        </div>
        <div id="thesis">
        	<?php 

            if(isset($_GET['sts']))
                echo '<script type="text/javascript">
          window.onload = function () { alert("Data updated!!"); }
           </script>';

            ?>
        </div>
         <script>
    function thesis() {
      var str = document.frm.th.value;
    if (str == "") {
        document.getElementById("thesis").innerHTML = "";
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
                document.getElementById("thesis").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","edit_thesis_process.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  </body>
</html>
