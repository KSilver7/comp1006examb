<?php
// add auth check
include('include/auth.php');

    $title = 'Upload Logo';
    include('include/header.php'); ?>
    <h2>Upload Logo</h2>
    <h3>Use this form to upload your logo photo</h3>
        <!-- direct the info to go to the save logo page-->
        <form method="post" action="save-logo.php" enctype="multipart/form-data">
            <!--photo fieldset-->
            <fieldset>
                <label for="logo">Logo Photo:</label>
                <input type="file" name="logo" accept="jpeg" />
            </fieldset>
            <!-- save button-->
            <button>Save</button>
        </form>
    </main>
</body>
</html>