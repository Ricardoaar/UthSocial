<?php

require('../partials/header.php');
require('../bin/Crud.php');

$questCrud = new Crud('question');
$ansCrud = new Crud('answer_storage');
$formCrud = new Crud('form');
$title = "";
$id = $_REQUEST['id'];

#TODO: Dividir tipo de preguntas y darles su plantilla
#TODO: Redireccionar a bin/ansForm
#TODO:

$formData = $formCrud->where_and("id", "=", $id)->get();
$questionData = $questCrud->where_and("id_form", "=", $id)->get();
$answersData = $ansCrud->get();
foreach ($formData as $field) {
    foreach ($field as $key => $value) {
        if ($key == 'name') {
            $title = $value;
        }
    };
}


function displayText($question)
{
    echo "
<div class='my-5 col-12 text-center'>
<label >$question
        <input  type='text' class='form-group w-75' name='$question'>
    </label>
    </div>";
}

function displayNum($question)
{
    echo "

            <div class='my-5 col text-center'>
            <label>$question
        <input type='number' class='form-group' name='$question'>
            </label></div>";
}

function displayMulti($question, $answers)
{
    echo "
<div class='my-5 col-12 text-center'>

<label for='$question'>$question</label>
<select class='form-control' name='$question' id='$question'> ";
    foreach ($answers as $ans) {
        echo "
                <option value='$ans'>$ans</option>";
    }
    echo "</select></div>";
}


?>
    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">
                        <?= $title ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <form action="" method="post">
                <div class="row text-center">

                    <?php

                    $answersIds = [];
                    $questions = [];
                    $answers = [];

                    foreach ($questionData as $data) {
                        foreach ($data as $value) {
                            array_push($value);
                        }
                    }
                    foreach ($answersData as $item) {
                        $current = [];
                        foreach ($item as $ans) {
                            array_push($current, $ans);
                        }
                        array_push($answers, $current);
                    }


                    foreach ($questionData as $questDatum) {
                        $current = [];
                        foreach ($questDatum as $question) {
                            array_push($current, $question);
                        }
                        $type = $current[3];
                        if ($type == 'num') {
                            displayNum($current[1]);
                        } else if ($type == 'text') {
                            displayText($current[1]);
                        } else {
                            $availableAns = [];
                            foreach ($answers as $answer) {
                                if ($answer[2] == $current[0]) {
                                    array_push($availableAns, $answer[1]);
                                }
                            }
                            displayMulti($current[1], $availableAns);
                        }
                    }
                    ?>


                    <button class="btn btn-success"></button>
                </div>

            </form>
        </div>


    </main>
<?php
require('../partials/footer.php');
