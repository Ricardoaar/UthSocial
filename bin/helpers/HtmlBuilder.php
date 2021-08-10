<?php
function buildTableDicAsString($headers, $data): string
{
    $table = "<table class='table text-center'><thead><tr>";
    foreach ($headers as $head) {
        $table .= "<th scope='col'>$head</th>";
    }
    $table .= "</tr></thead><tbody>";

    foreach ($data as $arr) {
        $table .= "<tr>";
        foreach (array_values($arr) as $value) {
            $table .= "  <th scope='col'>$value</th>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody></table>";
    return $table;
}

function buildTableStdAsString($headers, $data): string
{
    $table = "<table class='table table-responsive-md'><thead><tr>";
    foreach ($headers as $head) {
        $table .= "<th scope='col'>$head</th>";
    }
    $table .= "</tr></thead><tbody>";

    try {
        foreach ($data as $arr) {
            $table .= "<tr>";
            foreach ($arr as $value) {
                $table .= "  <th scope='col'>$value</th>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody></table>";
        return $table;
    } catch (Exception $e) {
        echo "<pre>";
        var_dump($e->getTraceAsString());
    }
}