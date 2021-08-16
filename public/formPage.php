<?php

require('../partials/header.php');


?>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <h2>Elige el cuestionario que deseas contestar</h2>
                </div>


            </div>

            <div class="row">
                <?php
                require('../bin/Crud.php');
                require('../bin/helpers/HtmlBuilder.php');
                $formCrud = new Crud('form');
                $data = $formCrud->get();
                $extraCol = ['a1' => ['/public/formDisplay.php',
                    "<p>Contestar</p>"]];
                $config = ['extra_cols' => $extraCol];
                $headers = ['#', 'Nombres', 'Categoria', 'Contestar'];
                echo buildTableStdAsString($headers, $data, $config);
                ?>
            </div>
        </div>

        <div class="container">
        </div>
    </main>

<?php
require('../partials/footer.php');
