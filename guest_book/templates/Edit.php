<form method="post" action="?action=Edit">
    <?php
    foreach ($data as $key => $value) {
        echo "<input type='text' name='$key' value='$value'><br>";

    }
    ?>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="submit" value="OK">
</form>



