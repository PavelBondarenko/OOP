<?php
//echo "<table class = 'table table-striped table-dark'>";
//foreach ($table as $row) {
//    echo '<tr>';
//    foreach ($row as $value) {
//        echo "<td>$value</td>";
//    }
//    echo "<td><a href='?action=ShowEdit&id=$row[id]'>✏</a></td></td>";
//    echo "<td><a href='?action=del&id=$row[id]'>❌</a></td></td>";
//    echo "</tr>";
//
//}
//echo '</table>';

echo View\Html\Html::create('TableEdited')->data($table)->class('table table-striped table-dark')->html();

?>
<form method="POST" class="form" style="margin-right: 800px;" action="?action=add">
    <textarea name='text' class=" form-control" rows="3" cols="2" placeholder="Введите текст"></textarea>
    <input class="form-control" type="text" placeholder="Username" name="name">
    <button class="btn btn-outline-secondary">Отправить</button>
</form>