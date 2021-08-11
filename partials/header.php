<?php
$urlArr = explode('/', $_SERVER['REQUEST_URI']);
$currentPage = $urlArr[count($urlArr) - 1];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="../assets/css/index.css">
    <title> UTH SOCIAL</title>
</head>
<body class="d-flex flex-column min-vh-100">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger w-100">
        <a class="navbar-brand"
           href="/index.php"> UTH SOCIAL</a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['info'])) : ?>

                    <?php $user = $_SESSION['info']['name'] ?>
                    <li><span class="nav-link active">Bienvenido <?= $user ?></span>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="/bin/closeSession.php">Cerrar Sesión</a>
                    </li>
                <?php elseif (substr($currentPage, 0, strlen('login.php')) === 'login.php'): ?>
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="/index.php">Volver al home</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="/public/login.php">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
</header>