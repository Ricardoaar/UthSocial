<?php
require('../partials/header.php');
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                require('../bin/Crud.php');
                $id = $_REQUEST['id'];
                echo "<table class=\"table table-responsive-md\"><tr>";
                echo "<th scope='col'>#</th>";
                echo "<th scope='col'>Respuesta</th>";
                echo "<th scope='col'>Repeticiones</th>";
                echo "</tr></thead><tbody>";

                $con = new Connection();
                $connection = $con->connect();


                $sql = "SELECT question FROM question where id = $id";
                $title = $connection->prepare($sql);
                $title->execute();
                $title_data = $title->fetchAll(PDO::FETCH_ASSOC);
                $title = $title_data[0];

                echo "<h2 class='text-center my-5'>" . ($title['question']) . "</h2>";

                $sql = "SELECT answer FROM answer_storage where id_question=$id";
                $ans = $connection->prepare($sql);
                $ans->execute();
                $ans_data = $ans->fetchAll(PDO::FETCH_ASSOC);
                $answers = [];
                foreach ($ans_data as $item) {
                    foreach ($item as $ans) {
                        array_push($answers, $ans);
                    }
                }
                $count = 1;
                foreach ($answers as $answer) {
                    $sql = "SELECT COUNT(*) as val FROM answer WHERE answer='$answer'";
                    $ans = $connection->prepare($sql);
                    $ans->execute();
                    $ans_data = $ans->fetchAll(PDO::FETCH_ASSOC);
                    $value = $ans_data[0]['val'];
                    echo "<th scope='col'>$count</th>";
                    echo "<th scope='col'>$answer</th>";
                    echo "<th scope='col'>$value</th>";
                    echo "</tr>";
                    $count++;
                }
                echo "</tbody></table>";

                ?>

            </div>
        </div>
        <?php $id_f = $_REQUEST['f'];
        echo "<a href='analystForm.php?id=$id_f'' class='btn btn-danger'>Regresar</a>"
        ?>
    </div>

</main>
<?php
require('../partials/footer.php');
?>
