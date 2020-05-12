<?php

/**
 * Искуственный интелект для игры в крестики нолики
 */
class Ai extends Tictac
{
    private function putRand(string $method)
    {
        if ($this->checWin() === null) {

            $moves = $this->searchEmptyCells();


            if (count($moves) > 1) {
                $move = $moves[random_int(0, count($moves) - 1)];
            } else {
                $move = $moves[0];
            }

            if (!empty($move)) {
                $this->{$method}($move['i'], $move['j']);
            }
        }
        return $this;
    }

    public function saveMap()
    {
        if (!empty($this->getMap())) {
            $_SESSION['map'] = $this->getMap();
        }
        return $this;
    }

    public function loadMap()
    {
        if (!empty($_SESSION['map'])) {
            $this->setMap($_SESSION['map']);
        }
        return $this;
    }
    /**
     * Случайный ход крестиком
     */
    public function putRandCross()
    {
        return $this->putRand('putCross');
    }

    /**
     * Случайный ход ноликом
     */
    public function putRandNull()
    {
        return $this->putRand('putNull');
    }

    public function searchEmptyCells()
    {
        $moves = [];
        foreach ($this->map as $i => $row) {
            foreach ($row as $j => $cell) {
                if ($cell === null) {
                    $moves[] = ["i" => $i, "j" => $j];
                }
            }
        }
        return $moves;
    }

    /**
     * Игра компьютера самого с собой
     */
    public function selfGaming()
    {
        $mapSize = $this->mapSize() ** 2;
        $count = 0;
        while ($this->checWin() === null && $count < $mapSize) {
            $this->putRandNull();
            $this->putRandCross();

            $count++;
        }
    }
}