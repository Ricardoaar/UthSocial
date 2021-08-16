<?php
require('Crud.php');

$formCrud = new Crud('form');
$questionCrud = new Crud('question');
$answersCrud = new Crud('answer_storage');
$data = $_POST;
$title = $data['title'];
$questions = [];
$answers = [];
$formId = $formCrud->insert(['name' => $title, 'id_category' => 1]);
$open = [];
function endsWith($haystack, $needle): bool
{
    $length = strlen($needle);
    if (!$length) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}

foreach ($data as $key => $item) {
    if (startsWith($key, 'question')) {
        $questions[$key] = $item;
    } else if (startsWith($key, "answer")) {
        $answers[$key] = $item;
    }
}

$ids = [];

foreach ($questions as $question => $value) {
    $type = "";
    if (endsWith($question, 'num')) {
        $type = 'num';
    } else if (endsWith($question, 'text')) {
        $type = 'text';
    } else {
        $type = 'mult';
    }
    $object = ['question' => $value, 'id_form' => $formId, 'type' => $type];
    $id = $questionCrud->get();
    $questionCrud->insert($object);
    if ($type == 'mult') {
        array_push($ids, $questionCrud->getMaxId());
    }
}
$current = 0;
$currentFlag = "";
foreach ($answers as $answer => $value) {
    $position = strpos($answer, 'on');
    $thisFLag = substr(substr($answer, $position), 2);
//    echo $currentFlag . " : " . $thisFLag . "<br>";
    if ($currentFlag == "") {

        $currentFlag = $thisFLag;
    } else if ($currentFlag != $thisFLag) {
        $currentFlag = $thisFLag;
        $current++;
    }
    $questID = $ids[$current];
    $obj = ['answer' => $value, 'id_question' => $questID];
    $answersCrud->insert($obj);
}


function startsWith($text, $needle): bool
{
    return (substr($text, 0, strlen($needle)) === $needle);
}

header("Location: /public/adm/");
?>