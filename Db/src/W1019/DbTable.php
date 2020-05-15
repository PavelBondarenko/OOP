<?php

namespace W1019;

use mysqli;

class DbTable implements CRUDInterface
{
    private $mysqli;
    private $tableName;

    public function __construct(mysqli $mysqli, $tableName)
    {
        $this->mysqli = $mysqli;
        $this->tableName = $tableName;
    }

    public function get(): array
    {
        $result = $this->mysqli->query("SELECT * FROM $this->tableName;");

        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }
}