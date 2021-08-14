<?php
require('../../partials/header.php');
//if ($_SESSION['info']['id_user_type'] != 1) {
//    require('../../bin/redirect.php');
//    redirectUser(0);
//}

if (count($_POST) > 0) {
    foreach ($_POST as $item) {
        echo $item;
    }
}

?>

    <main>

        <div class="container mt-5">
            <div class="row">
                <div class="col-6 ">
                    <a class="btn btn-success w-100" id="addQ">
                        Agregar pregunta
                    </a>
                </div>
                <div class="col-6">
                    <form action="">
                        <label class="w-100">
                            <select id="type" class="form-control w-100">
                                <option value="multiple">Multiple</option>
                                <option value="open">Abierta</option>
                                <option value="number">Numero</option>
                            </select>
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <form action="CreateForm.php" method="post">
                <div id="forms">

                </div>
                <button class="btn btn-success ml-auto w-50 mt-5" type="submit">Agregar Cuestionario</button>
            </form>
        </div>
    </main>
    <script type="module" src="js/Generator.js"></script>
    <script type="module" src="js/form.js"></script>

<?php

require('../../partials/footer.php');
