<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("rental_library",$con);
    $query=mysql_query("SELECT * FROM `student` WHERE `Roll` LIKE '{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['Roll'];
    }
    echo json_encode($array);
?>
