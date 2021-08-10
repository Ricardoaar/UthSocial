<?php

if (!isset($_SESSION['info'])) {
    header("Location: /");
}
require('../../partials/header.php');
?>

    <main>

        require('bin/helpers/HtmlBuilder.php');
        require('bin/Crud.php');
        $crud = new Crud("user");
        $headers = ["#", "Email", "Contraseña", "Nombre", "Apellido", "Alias", "Activo"];
        $data = $crud->get();
        echo buildTableStdAsString($headers, $data);

    </main>
<?php
require('../../partials/footer.php');
require('../../partials/bootstrapScripts.php');
