<?php
function displayUsers()
{
    require('helpers/HtmlBuilder.php');
    require('Crud.php');
    $crud = new Crud("user");
    $headers = ["#", "Email", "Contraseña", "Nombre", "Apellido", "Alias", "Activo", "Editar", "Eliminar"];
    $data = $crud->get();
    $extraCols = ["a1" => ['/bin/edit.php',
        "<img src='/assets/editar.png' alt='' height='20px'></a>"],
        "a2 " => ['/bin/delete.php'
            , "<img src='/assets/eliminar.png' alt='' height='20px'>"]];
    $config = ["extra_cols" => $extraCols, "tr" => 'xl', "tc" => "thead-dark"];
    echo buildTableStdAsString($headers, $data, $config);
}
?>
