<?php


function getUserKeys(): array
{
    return ['id', 'email', 'password', 'name', 'last_name', 'alias', 'id_user_type'];
}

function convertProtoToArray($data, $keys): array
{
    $values = [];
    foreach ($data as $key => $arr) {
        foreach ($arr as $value) {
            array_push($values, $value);
        }
    }
    $finalData = [];
    for ($i = 0; $i < count($values); $i++) {
        $finalData[$keys[$i]] = $values[$i];
    }
    return $finalData;
}
