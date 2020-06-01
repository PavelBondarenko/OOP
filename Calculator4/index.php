<?php
include 'src/autoload.php';

use Calcul\Calc;


$calc = new Calc();
$calc->set(5) . "\n";
echo $calc->get(); // 5
$calc->add(3);
echo $calc->get(); // 8 