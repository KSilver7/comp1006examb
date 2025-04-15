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
    try {
        // connect to db
        include('include/db.php');
        // add insert
        $sql = "INSERT INTO examridings (ridingId, name, provinceId) VALUES
            (:ridingId, :name, :provinceId)";
        $cmd = $db->prepare($sql);

        // Add bind params for safety
        $cmd->bindParam(':ridingId', $ridingId, PDO::PARAM_INT);
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
        $cmd->bindParam(':provinceId', $provinceId, PDO::PARAM_INT);

        // add execute
        $cmd->execute();

        // disconnect from db
        $db = null;
        // add confirmation
        echo "Riding Saved";
    }
    catch (Exception $err) {
        // show generic error page
        header('location:ridings.php'); 
    }
   
}
?>
</body>

</html>