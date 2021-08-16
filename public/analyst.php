<?php
require('../partials/header.php');


?>

    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    Analista
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                require('../bin/helpers/HtmlBuilder.php');
                require('../bin/Crud.php');
                $formCrud = new Crud("form");
                $data = $formCrud->get();
                $headers = ["id", "Nombre", "Categoria","Ver"];
                $extraCols = ['a1' => ['/public/form', "<img src='/assets/editar.png' alt='' height='20px'>"]];
                $config = ["extra_cols" => $extraCols];
                buildTableStdAsString($headers, $data, $config);
                ?>
            </div>

        </div>
    </main>

<?php
require('../partials/footer.php'); ?>