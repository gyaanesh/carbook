<?php
// PHP program to delete a file named gfg.txt 
// using unlike() function 
$root  		=	$_SERVER['DOCUMENT_ROOT']."/carService";
$file_pointer 	= $root."/temp.php"; 
$dir = $root."/ms";
   
// Use unlink() function to delete a file 
if (!unlink($file_pointer)) { 
    echo ("$file_pointer cannot be deleted due to an error"); 
} 
else { 
    echo ("$file_pointer has been deleted"); 
} 
  
  deleteDirectory($dir);
  function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}
?> 