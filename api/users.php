<?php
// connect
include('include/db.php');
// optional name filter
$name = null;

// fetch users frome examusers
$sql = "SELECT * FROM examusers";

// add where clause filter if url has a username parameter
if (!empty($_GET['username'])) {
    $name = $_GET['username'];
    $sql .= " WHERE username = :username";
}

$cmd = $db->prepare($sql);

// fill username param if we have one
if (!empty($_GET['username'])) {
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
}

$cmd->execute();
// structure results in a n array so we can change them to json
$users = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert dataset to json and send response
echo json_encode($users);

// disconnect
$db = null;
?>