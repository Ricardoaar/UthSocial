<?php
session_start();
if (!isset($_SESSION['info'])) {
//    header("Location: /");
}


$userData = $_SESSION['info'];


require('../../partials/header.php');
require('../../bin/shower.php');
?>

    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Administrador</h2>

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
