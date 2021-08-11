<?php

$user_type = $_REQUEST['id_user_type'];
$destiny = "";
switch ($user_type) {
    case 1:
        echo "hi";
        $destiny = "/public/adm/index.php";
        break;
    case 2:
        $destiny = "b";
        break;
    case 3:
        $destiny = "a";
        break;
}

header("Location: " . $destiny);
