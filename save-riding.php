<?php
require 'include/auth.php';
$title = 'Saving Riding...';
require 'include/header.php';

$name = $_POST['name'];
$provinceId = $_POST['provinceId'];
$ridingId = $_POST['ridingId'];
$ok = true;

if (empty(trim($name))) {
    echo 'Name is required<br />';
    $ok = false;
}

if (empty($provinceId)) {
    echo 'Province is required<br />';
    $ok = false;
} else {
    if (!is_numeric($provinceId)) {
        echo 'Province Id must be numeric<br />';
        $ok = false;
    }
}

if ($ok == true) {

    // save code goes here

    echo "Riding Saved";
    header('location:ridings.php');
}
?>
</body>

</html>