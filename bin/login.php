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
        require('../bin/redirect.php');
        session_start();
        $_SESSION['info'] = $finalData;
        $idUT = intval($finalData['id_user_type']);
        redirectUser($idUT);
    } else {
        header($destiny . "2");
    }
} else {
    header($destiny . "1");
}
