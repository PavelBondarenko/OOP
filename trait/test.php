<?php

include "autoload.php";

$calc = new Calculator();

echo $calc->sum(10, 5);

echo "\n";

echo $calc->mul(10, 5);

echo "\n";

echo $calc->sub(10, 5);

echo "\n";

echo $calc->div(10, 5);