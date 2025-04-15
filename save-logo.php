<?php
// add auth check
include('include/auth.php');
include('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Saved!</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <main>
    <h2>Your logo has been uploaded.</h2>
<?php


// photo checks
if ($_FILES['photo']['size'] > 0) {
    $type = mime_content_type($_FILES['photo']['tmp_name']);
    if ($type != 'image/jpeg') {
        echo 'Upload a valid image file only.';
        $ok = false;
    }
    else {
        // add the function to create unique names
        $photo = uniqid() . '-' . $_FILES['photo']['name'];

        // copy uploaded img to folder
        move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $photo);
    }
}

// if all is good at this point, save to the db
if ($ok == true) {
    // connect to db
    include('include/db.php');
    // add insert
    $sql = "INSERT INTO users (photo) VALUES (:photo)";
    $cmd = $db->prepare($sql);

    // add bind params
    $cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 100);
    // add execute
    $cmd->execute();

    // disconnect from db
    $db = null;

    // add confirmation
    echo 'Logo has been saved!';
}
?>
</main>
</body>
</html>
