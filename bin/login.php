<?php
include('Crud.php');
include('helpers/prototypes.php');

$destiny = "Location: /public/login.php?err=";
if (isset($_REQUEST['password']) && isset($_REQUEST['email'])) {

    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    $userCrud = new Crud("user");
    $data = $userCrud->where_and('email', 'like', '%' . $email)
        ->where_and('password', 'like', '%' . $password)->get();
    $finalData = convertProtoToArray($data, getUserKeys());

    if ($data) {

        switch ($finalData['id_user_type']) {
            case 1:
                $destiny = "";

                break;
            case 2:
                $destiny = "b";
                break;
            case 3:
                $destiny = "a";
                break;

        }
        session_start();
        $_SESSION['info'] = $finalData;
        header($destiny);
    } else {
        header($destiny . "2");
    }
} else {
    header($destiny . "1");
}
