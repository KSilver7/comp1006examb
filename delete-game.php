<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Riding...</title>
</head>
<body>
<?php
require 'include/auth.php';

$ridingId = $_GET['ridingId'];

if (is_numeric($ridingId)) {
    require 'include/db.php';

    $sql = "DELETE FROM examridings WHERE ridingId = :ridingId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':ridingId', $ridingId, PDO::PARAM_INT);
    $cmd->execute();

    $db = null;
}

header('location:ridings.php');
?>
</body>
</html>
