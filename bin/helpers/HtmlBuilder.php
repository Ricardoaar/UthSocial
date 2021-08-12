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

function buildTableStdAsString($headers, $data, $config = []): string
{
    if (count($config) > 0) {
        $tr = $config['tr'];
        $tableColor = $config['tc'];
        $extraCols = $config['extra_cols'];
    }

    $table = "<table class=\"table table-responsive-$tr\"><thead class=\"$tableColor\"><tr>";
    foreach ($headers as $head) {
        $table .= "<th scope='col'>$head</th>";
    }
    $table .= "</tr></thead><tbody>";


    foreach ($data as $arr) {
        $isId = true;
        $id = null;
        $table .= "<tr>";
        foreach ($arr as $value) {
            if ($isId) {
                $id = $value;
                $isId = false;
            }
            $table .= "  <th scope='col'>$value</th>";
        }
        if (!isset($extraCols)) {
            $table .= "</tr>";
            continue;
        }
        $table .= buildExtraCols($extraCols, $id);
        $table .= "</tr>";
    }
    $table .= "</tbody></table>";
    return $table;
}

function buildExtraCols($extraCols, $id): string
{
    $col = "";

    if (count($extraCols) == 0)
        return "";

    foreach ($extraCols as $key => $data) {
        if (substr($key, 0, strlen(1)) === 'a') {
            $col .= "<th>";
            $col .= buildA($data[0], $id, $data[1]);
            $col .= "</th>";
        }
    }
    return $col;
}

function buildA($url, $id = 0, $content = ""): string
{
    $href = $url . "?id=" . $id;
    return "<a href=$href>$content</a>";
}
