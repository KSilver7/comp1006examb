<?php
$title = 'Ridings';
require 'include/header.php'; ?>

<h1>Ridings</h1>
<?php
if (!empty($_SESSION['username'])) {
    echo '<a href="riding-details.php">Add a New Riding</a>';
}

require 'include/db.php';

$sql = "SELECT examridings.*, examprovinces.name AS province FROM examridings 
        INNER JOIN examprovinces ON examridings.provinceId = examprovinces.provinceId";

$cmd = $db->prepare($sql);
$cmd->execute();
$ridings = $cmd->fetchAll();

echo '<table class="table table-striped table-hover">
        <thead>
            <th>Riding</th>
            <th>Province</th>     
            <th></th>
        </thead>';

foreach ($ridings as $r) {
    echo '<tr><td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="riding-details.php?ridingId=' . $r['ridingId'] . '">
                ' . $r['name'] . '</a>';
    } else {
        echo $r['name'];
    }
    echo '</td>';
    echo   '<td>' . $r['province'] . '</td>
            <td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="delete-riding.php?ridingId=' . $r['ridingId'] . '" 
                class="btn btn-danger" onclick="return yaSure();">Delete</a>';
    }
    echo '</td></tr>';
}

echo '</table>';

$db = null;

?>
</body>

</html>