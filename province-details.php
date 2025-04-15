<?php
$title = 'Province Details';
require 'include/header.php'; ?>
<main>
    <form method="post" action="save-province.php">
        <fieldset class="p-2">
            <label for="name" class="col-2">Province: </label>
            <input name="name" id="name" required maxlength="100"/>
        </fieldset>
        <button class="offset-2 btn btn-primary p-2">Save</button>
    </form>
</main>
</body>
</html>
