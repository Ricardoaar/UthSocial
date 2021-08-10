<?php
require_once("partials/header.php");
////session_start();
//$userName = "";
//$crud = new Crud();
//if (isset($_SESSION['user_id'])) {
//    $data = $crud->where_and("user_id", "=", $_SESSION['user_id'])
//        ->get();
//    $data = ['userId'];
//}

?>

    <body>

    <main>
        <div class="container my-5">
            <div class="row pt-5">
                <div class="col text-center ">
                    <h3>
                        Bienvenido a UTH Social

                    </h3>
                    <small class="small">El lugar donde todos decimos lo que pensamos</small>
                </div>
            </div>
            <div class="row text-center my-5">

            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-12  col-xl-8 offset-md-0 offset-xl-2 w-100 text-center">


                    <?php
                    require('bin/helpers/HtmlBuilder.php');
                    require('bin/Crud.php');
                    $crud = new Crud("user");
                    $headers = ["#", "Email", "Contraseña", "Nombre", "Apellido", "Alias", "Activo"];
                    $data = $crud->get();
                    echo buildTableStdAsString($headers, $data);

                    ?>
                </div>
            </div>

        </div>
    </main>

    </body>

<?php


require_once("partials/footer.php");