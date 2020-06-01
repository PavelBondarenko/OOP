<?php

namespace View\Html;

class TableEdited extends Table
{
    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "<tr>";
            foreach ($row as $cell) {
                $str .= "<td>$cell</td>";
            }
            $str .= "<td><a href='?action=del&id=$row[id]'>❌</a></td>";
            $str .= "<td><a href='?action=showedit&id=$row[id]'>✏</a></td>";
            $str .= "</tr>";
        }

        $this->data = $str;
        return $this;
    }
}