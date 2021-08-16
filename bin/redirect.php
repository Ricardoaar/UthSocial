<?php

function redirectUser($userType)
{
    $destiny = "";
    switch ($userType) {
        case 1:
            $destiny = "/public/adm/index.php";
            break;
        case 2:
            $destiny = "/public/analyst.php";
            break;
        case 3:
            $destiny = "a";
            break;
        default:
            $destiny = "/";

    }
    header("Location: " . $destiny);
}
