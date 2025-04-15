<?php
$title = 'Saving Province...';
require 'include/header.php';
$name = $_POST['name'];
$ok = true;

if (empty(trim($name))) { 
    echo 'Name is required<br />';
    $ok = false;
}

if ($ok == true) {
    // save code goes here

    echo 'Province Saved';
}

?>
</body>
</html>
