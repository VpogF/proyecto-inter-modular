<?php
    require_once('./php_librarys/bd.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HerramientaGP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./myStyle.css">
</head>

<body>
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid d-flex justify-content-around">
            <a class="navbar-brand" href="#">
                <i class="bi bi-house fs-3 text-white"></i>
            </a>
            <a class="navbar-brand" href="#">
                <img src="./img/logo_3-blanco.jpg" alt="" width="50" height="50" class="rounded-circle"
                    class="d-inline-block align-text-top">
            </a>
            <a class="navbar-brand" href="#">
                <i class="bi bi-person fs-3 text-white"></i>
            </a>
        </div>
    </nav>

    <div class="container bg-beige pt-3 pb-3 mt-5 d-flex justify-content-center cont-1 col col-sm-3 col col-sx-1">

        <form class="login-regitro-form" action="./php_controllers/userController.php" method="POST">
            <div class="cont-titulo-1">
                <h3 class="card-title text-pink">Crear Cuenta</h3>
            </div>
            <div class="input-cont">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-danger label-class">Nombre Usuario</label>
                    <input type="text" class="form-control input-class" name="nom_user" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-danger label-class">Email</label>
                    <input type="email" class="form-control input-class" name="email_user" id="exampleFormControlInput1 ">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-danger label-class">Constraseña</label>
                    <input type="password" class="form-control input-class" name="pass_user" id="exampleFormControlInput1">
                </div>
            </div>
            <button type="submit" class="btn btn-pink text-danger regist-btn" name="insert">Registrarse</button>
        </form>

    </div>

    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>



</html>