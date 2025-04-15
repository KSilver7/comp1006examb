<?php
require 'include/auth.php';
$title = 'Riding Details';
require 'include/header.php'; 

if (!empty($_GET['ridingId'])) {
    $ridingId = $_GET['ridingId'];

    require 'include/db.php';
    $sql = "SELECT * FROM examridings WHERE ridingId = :ridingId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':ridingId', $ridingId, PDO::PARAM_INT);
    $cmd->execute();
    $riding = $cmd->fetch();

    $name = $riding['name'];
    $provinceId = $riding['provinceId'];
    $db = null;
}
else {
    $riding = null;
    $name = null;
    $provinceId = null;
}
?>

<main class="container">
    <h1>Riding Details</h1>
    <form method="post" action="save-riding.php" enctype="multipart/form-data">
        <fieldset class="p-2">
            <label for="name" class="col-2">Name: </label>
            <input name="name" id="name" required maxlength="100"
                value="<?php echo $name; ?>" />
        </fieldset>
        <fieldset class="p-2">
            <label for="provinceId" class="col-2">Province:</label>
            <select name="provinceId" id="provinceId">
                <?php
                require 'include/db.php';

                $sql = "SELECT * FROM examprovinces ORDER BY name";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $provinces = $cmd->fetchAll();

                foreach ($provinces as $p) {
                    if ($provinceId == $p['provinceId']) {
                        echo '<option selected value="' . $p['provinceId'] . '">' . $p['name'] . '</option>';
                    }
                    else {
                        echo '<option value="' . $p['provinceId'] . '">' . $p['name'] . '</option>';
                    }
                }

                $db = null;

                ?>
            </select>
        </fieldset>
        <input name="ridingId" id="ridingId" type="hidden" value="<?php echo $riding['ridingId']; ?>" />
        <button class="offset-3 btn btn-success p-2">Save</button>
    </form>
</main>

</body>
</html>
