<?php

use W1019\DbTable;

include "src/autoload.php";

$table = new DbTable(
    new mysqli(
        "localhost",
        "root",
        "",
        "bd124"
    ),
    "table124"
);

print_r($table->get());