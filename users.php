<?php
// auth check here
include('include/auth.php');

$title = 'Users';
include('include/header.php'); ?>
<h1>Users</h1>
<?php

include ('include/db.php');

$sql = "SELECT * FROM username";
$cmd = $db->prepate($sql);
$cmd->execute();
$username = $cmd->fetchALL();

echo '<table><thead><th>Username</th>';
// only allow authenticated users to see this
if (isset($_SESSION['username'])) {
    echo '<th>Username</th>';
}

echo '</thead>';
foreach ($username as $user) {
    echo "<tr>
        <td>{$user['username']}</td>";     
    
echo "</tr>";
}
echo '</table>':
// disconnect from db
$db = null;
?>
    </main>
</body>
</html>