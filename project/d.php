
<?php
   include "db_connect.php";
   $sql="SELECT * FROM `uploads`";
   $result=mysql_query($sql);
   ?>
   	<!DOCTYPE html>
   	<html>
   	<head>
   		<title></title>
   		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">

<script>
    function how_come(str) {
    	
   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("all_file").innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open("GET","e_resource.php?q="+str,true);
        xmlhttp.send();
}

</script>

   	</head>
   	<body style="padding:20px;">
   	<div style="padding-left:200px;padding-right:200px;padding-bottom:20px;">
			<form action="search.html" class="search">
				<div class="input-group">			
					<input type="text" class="form-control" onkeyup="how_come(this.value)" placeholder = "Search for question/book/e-resource/thesis...">
					<span class="input-group-btn ">
						<button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
					</span>
				</div>
			</form>	
		</div>

    <div style="padding-left:200px;padding-right:200px;" id="all_file">
   	<table class="table table-striped">
   <tr><th>Serial</th><th>Name</th><th>Category</th><th>Download</th><th>View</th></tr>
  
   <?php
   $serial=1;
   while ($row=mysql_fetch_array($result))
   {

   	?>
   	<tr><td><?php echo $serial; ?></td>
   	<td><label class="col-sm-2 control-label"><?php echo $row['name']; ?></label></td>
   	<td><label class="col-sm-2 control-label"><?php echo $row['type']; ?></label></td>
   	<td><label><a href="d1.php?f=<?php echo $row['url'];?>"> <button type="button" class="btn btn-info">Download</button></a></label></td>
    <td><label><a href="<?php echo $row['url']."\""; ?>" target="_blank"><button type="button" class="btn btn-success">View</button></a></label></td>
   	</tr>
<?php  $serial++; } ?>
</table>
   	</div>
   	</body>
   	</html>


  

