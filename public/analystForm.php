<?php
require('../partials/header.php');
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                require('../bin/Crud.php');
                require('../bin/helpers/HtmlBuilder.php');
                $id = $_REQUEST['id'];

                $questCrud = new Crud('form_display');
                $questCrud->where_and("id", "=", intval($id));
                
                $data = $questCrud->get();
                $headers = ['Form Id', 'Pregunta', 'Respuesta'];
                $config = ["tr" => 'xl', "tc" => "thead-dark"];
                echo buildTableStdAsString($headers, $data, $config);
                ?>

            </div>
        </div>
        <a href="analyst.php" class="btn btn-danger">Regresar</a>
    </div>

</main>
<?php
require('../partials/footer.php');
?>
