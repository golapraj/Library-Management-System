<?php
   include "db_connect.php";
     $search_text = urldecode(filter_var(trim($_GET['q'])));
   $sql = "SELECT * FROM `uploads` WHERE `name` LIKE '%{$search_text}%' OR `type` LIKE '{$search_text}%'";  
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

</script>

   	</head>
   	<body style="padding:20px;">
    <div id="all_file">
   	<table class="table table-striped">
   <tr><th>Serial</th><th>Name</th><th>Type</th><th>View</th><th>Download</th></tr>
  
   <?php
   $serial=1;
   while ($row=mysql_fetch_array($result))
   {

   	?>
   	<tr><td><?php echo $serial; ?></td>
   	<td><label class="col-sm-2 control-label"><?php echo $row['name']; ?></label></td>
   	<td><label class="col-sm-2 control-label"><?php echo $row['type']; ?></label></td>
   	<td><label><a href="d1.php?f=<?php echo $row['url'];?>"> <button type="button" class="btn btn-info">Download</button></a></label></td>
    <td><label><a href="<?php echo $row['url']."\""; ?>" target="_blank"><button type="button" class="btn btn-success">Viwe</button></a></label></td>
   	</tr>
<?php  $serial++; } ?>
</table>
   	</div>
   	</body>
   	</html>


  

