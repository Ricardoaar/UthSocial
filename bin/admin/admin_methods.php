<?php


require('../Crud.php');
if (!isset($_REQUEST['option'])) header('Location: /');

$option = $_REQUEST['option'];
switch ($option) {
    case 1:
        $id = $_REQUEST['id'];
        $crud = new Crud('user');
        foreach ($_POST as $key => $value) {
            if (strlen($value) > 0) {
                $crud->where_and("id", "=", "$id")->update([$key => $value]);
            }
        }
        header("Location: /public/adm/");
        break;
}
