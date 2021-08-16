<?php
require_once("partials/header.php");
$msg = $_REQUEST['msg'];

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
                <div class="col">
                    <p class="text-center"><?= $msg ?></p>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12  col-xl-8 offset-md-0 offset-xl-2 w-100 text-center">
                    <a href="public/formPage.php"><H2>Ver cuestionarios</H2></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="offset-2 col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="/assets/COVI.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">El covid 19</h5>
                            <p class="card-text">Los coronavirus son una gran familia de virus que causan
                                enfermedades que van desde el resfriado común hasta enfermedades más graves. La epidemia
                                de COVID-19 fue declarada por la OMS una emergencia de salud pública de preocupación
                                internacional el 30 de enero de 2020.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="/assets/RedesSociales-retail-1024x898-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Redes sociales</h5>
                            <p class="card-text">Las redes sociales son estructuras formadas en Internet por personas u
                                organizaciones que se conectan a partir de intereses o valores comunes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>

<?php


require_once("partials/footer.php");
if ($_SESSION['info']) {
    require('bin/redirect.php');
    $userType = $_SESSION['info']['id_user_type'];
    switch ($userType) {
        case "Administrador":
            $userType = 1;
            break;
        case "Analista":
            $userType = 2;
            break;
        case "Usuario":
            $userType = 3;
            break;
    }
    redirectUser($userType);
}
?>