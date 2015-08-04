<?php
$mydir = "uploads/";
if ($handle = opendir($mydir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {  
?>
           <a href="download1.php?f=<?php echo $file ?>" target="_blank"><?php echo $file ?></a><br/>
<?php
        }
    }
    closedir($handle);
}
?>