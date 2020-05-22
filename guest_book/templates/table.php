<?php
echo "<table class = 'table table-striped table-dark'>";
foreach ($table as $row) {
    echo '<tr>';
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';
?>
<form method="POST" class="form" style="margin-right: 800px;">
    <textarea name='text' class=" form-control" rows="3" cols="2" placeholder="Введите текст"></textarea>
    <input class="form-control" type="text" placeholder="Username">
    <button class="btn btn-outline-secondary">Отправить</button>
</form>