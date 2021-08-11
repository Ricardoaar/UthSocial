<?php
//session_start();

require('../../partials/header.php');
require('../../bin/shower.php');

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
