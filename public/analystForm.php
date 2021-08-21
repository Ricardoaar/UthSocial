<?php
require('../partials/header.php');
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                require('../bin/Crud.php');

                echo "<table class=\"table table-responsive-md\"><tr>";
                echo "<th scope='col'>Id</th>";
                echo "<th scope='col'>Pregunta</th>";
                echo "<th scope='col'>Ver</th>";
                echo "</tr></thead><tbody>";

                $id = $_REQUEST['id'];
                $con = new Connection();
                $connection = $con->connect();
                $sql = "SELECT id,question FROM question where id_form=$id";

                $quest = $connection->prepare($sql);
                $quest->execute();
                $question_data = $quest->fetchAll(PDO::FETCH_ASSOC);
                $questions = [];
                foreach ($question_data as $question) {
                    $quest_id = $question['id'];
                    $questions[$quest_id] = $question['question'];
                }

                foreach ($questions as $qid => $question) {
                    echo "<th scope='col'>$qid</th>";
                    echo "<th scope='col'>$question</th>";
                    echo "<th scope='col'><a href='question.php?id=$qid&f=$id'><img height='20px' src='../assets/editar.png' alt=''></a></th>";
                    echo "</tr>";
                }
                echo "</tbody></table>";

                ?>

            </div>
        </div>
        <a href="analyst.php" class="btn btn-danger">Regresar</a>
    </div>

</main>
<?php
require('../partials/footer.php');
?>
