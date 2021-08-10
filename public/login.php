<?php

require("../partials/header.php");
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <?php if (isset($_REQUEST['err'])): ?>
                    <?php
                    switch ($_REQUEST['err']) {
                        case 1:
                            break;
                        case 2:
                            echo "<p class='text-danger'>Contraseña o usuario incorrectos</p>";
                            break;
                    }

                    ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="container mt-5">


        <form action="../bin/login.php"
              method="get">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       autocomplete="email"
                       required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       autocomplete="current-password"
                       required>
            </div>
            <div class="row">
                <div class="col-md-4  col-6 offset-3 offset-md-4">

                    <button type="submit"
                            class="btn btn-danger   text-center mt-4 w-100">
                        Iniciar sesión
                    </button>
                </div>
            </div>
        </form>
    </div>


<?php

require('../partials/footer.php');
