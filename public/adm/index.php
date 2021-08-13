<?php
//session_start();


require('../../partials/header.php');
require('../../bin/shower.php');
if ($_SESSION['info']['id_user_type'] != 1) {
    require('../../bin/redirect.php');
    redirectUser(0);
}
$message = "";
$err = $_REQUEST['err'];
if ($err) {
    switch (intval($err)) {
        case 1:
            $message = "No puedes eliminar tu mismo usuario!";
            break;
    }
}
?>

    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col text-center">
                    <h2 class="">Administrador</h2>
                    <small class="text-danger"><?= $message ?></small>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="offset-0 col-6 col-md-4 offset-md-2">

                    <a class="w-100 btn btn-danger" href="createUser.php">Agregar Usuario</a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="CreateForm.php" class="w-100 btn btn-danger">Agregar Encuesta</a>
                </div>
            </div>

        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-12  w-100 text-center">
                    <?php
                    displayUsers();
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php
require('../../partials/footer.php');
require('../../partials/bootstrapScripts.php');
