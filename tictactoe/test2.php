<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .tictac td {
        border: 1px solid black;
        width: 100px;
        height: 100px;
        text-align: center;
    }
    </style>
</head>

<body>
    <a href="?action=newGame">Новая игра!<br></a>
    <?php

    include 'autoload.php';

    $ai = new Ai(3);
    $ai->setSaver(new SessionSaver('map'));
    $ai->loadMap();

    switch ($_GET['action']) {
        case 'shot':
            if (!empty($ai->searchEmptyCells()) && $ai->checWin() === null) {
                $ai->putCross($_GET['i'], $_GET['j']);
            }
            $ai->putRandNull();

            break;
        case 'newGame':
            $ai->initMap(3);
            break;
    }

    $ai->saveMap();
    // $ai->selfGaming();
    if (empty($ai->searchEmptyCells()) || $ai->checWin() !== null) {
        if ($ai->checWin() === 1) {
            echo "Выйграли крестики!";
        } elseif ($ai->checWin() === 0) {
            echo "Выйграли нолики!";
        } else {
            echo "Ничья!";
        }
    }



    // $ai->initMap(3)
    //     ->putRandCross()
    //     ->putRandNull()
    //     ->putRandCross()
    //     ->putRandNull()
    //     ->putRandCross()
    //     ->putRandNull()
    //     ->putRandCross()
    //     ->putRandNull()
    //     ->putRandCross();

    $area = new Area();

    $area->setMap($ai->getMap());

    echo $area->html();
    ?>
</body>

</html>