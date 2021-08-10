<?php
include('Crud.php');
include('helpers/prototypes.php');
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$userCrud = new Crud("user");
$data = $userCrud->where_and('email', 'like', '%' . $email)
    ->where_and('password', 'like', '%' . $password)->get();
$finalData = convertProtoToArray($data, getUserKeys());

if ($data) {

    switch ($finalData['id_user_type']) {
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
    }
} else {
    header('Location: ../public/login.php?err=2');
}
