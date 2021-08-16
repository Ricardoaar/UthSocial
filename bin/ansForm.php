<?php
echo "<pre>";
require('Crud.php');
$form_id = $_REQUEST['id'];
$pollForm = new Crud('poll');
$ansCrud = new Crud('answer');

$pollForm->insert(["id_form" => $form_id]);

$pollId = $pollForm->getMaxId();

foreach ($_POST as $key => $value) {
    $a = explode('/', $key);
    $questId = $a[1];
    $answerObj = ["id_question" => $a[1],
        "id_poll" => $pollId,
        "answer" => $value];

    $ansCrud->insert($answerObj);
}

$msg = "Gracias por contestar la encuesta $form_id";
header("Location: /index.php?msg=$msg");