<?php
include('Crud.php');
include('helpers/prototypes.php');

$destiny = "Location: /public/login.php?err=";
if (isset($_POST['password']) && isset($_POST['email'])) {

    $password = $_POST['password'];
    $email = $_POST['email'];
    $userCrud = new Crud("user");
    $data = $userCrud->where_and('email', 'like', '%' . $email)
        ->where_and('password', '=', $password)->get();
    $finalData = convertProtoToArray($data, getUserKeys());

    if (count($finalData) > 0) {
        var_dump($finalData);
        switch (intval($finalData['id_user_type'])) {
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
        session_start();
        $_SESSION['info'] = $finalData;

        header("Location: " . $destiny);
    } else {
        header($destiny . "2");
    }
} else {
    header($destiny . "1");
}
