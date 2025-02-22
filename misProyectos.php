<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Invitado';

// $id_proyecto = isset($_SESSION['id_proyecto']) ? $_SESSION['id_proyecto'] : 'null';
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
    <nav class="navbar navbar-light bg-primary fixed-top">
        <div class="container-fluid d-flex justify-content-around">
            <a class="navbar-brand" href="/misProyectos.html">
                <i class="bi bi-house fs-3 text-white"></i>
            </a>
            <a class="navbar-brand" href="/index.html">
                <img src="./img/logo_3-blanco.jpg" alt="" width="50" height="50" class="rounded-circle"
                    class="d-inline-block align-text-top">
            </a>
            <div id="usuario" class="dropdown usuario" data-username="<?php echo htmlspecialchars($username); ?>">
                <p id="parrafo" class="text-white"></p>
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person fs-3 text-white"></i>
                </button>
                <ul class="dropdown-menu dropDownMenu">
                    <li><a class="dropdown-item" href="./logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>


        </div>
    </nav>

    <div class="proyectos-container">
        <div class="bg-beige proyectos-titulo-container">
            <h3 class="text-primary ps-4">Inicio</h3>
        </div>
        <div class="bg-beige proyectos-listado-container">
            <div id="listado-proyectos" class="listado-container">

            </div>
            <div class="aniadir">
                <!-- Button trigger modal -->
                <button type="button" class="bg-beige aniadir-boton" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal añadir tarea -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-beige">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-pink" id="exampleModalLabel">Crea tu Proyecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./php_controllers/userController.php" method="POST">
                        <div>
                            <input type="hidden" id="id" name="id" value="1">

                            <!-- Campo para el nombre -->
                            <label for="exampleFormControlInput1"
                                class="form-label text-danger label-class">Nombre:</label>
                            <input type="text" class="form-control input-class" id="nom_proyecto" name="nom_proyecto"
                                required>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-primary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" name='crear-proyecto'
                                    class="btn btn-pink text-danger">Confirmar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal añadir col -->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-beige">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-pink" id="exampleModalLabel">Añade Participantes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./php_controllers/userController.php" method="POST">
                        <div>
                            <input type="hidden" id="idProyecto" name="idProyecto">

                            <!-- Campo para el nombre -->
                            <label for="exampleSelect" class="form-label text-danger label-class">Colaborador:</label>
                            <select class="form-select" id="usuarioSelect" name="colaborador" >

                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-primary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" name="aniadir-col"
                                    class="btn btn-pink text-danger">Confirmar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./script.js"></script>
</body>



</html>