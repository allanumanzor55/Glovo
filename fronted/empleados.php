<?php 
    require_once('../backend/class/class-login.php');
    require_once('../backend/class/class-database.php');
    $database = new Database();
    $db = $database->getDB();
    if(!Login::verificarAutentificacion($db) or $_COOKIE['tipoUsuario']!="Administradores"){
        header("Location: error.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Empleados</title>
</head>

<body class="container-fluid px-0">
    <nav class="navbar justify-content-between mt-4 mx-5">
        <a class="navbar-brand top" style="color: white;">
            <img src="resource/icons/glovo-logo-2.svg" class="img-fluid" width="130px">
        </a>
    </nav>
    <hr>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link active" id="repartidores-tab" data-toggle="tab" href="#repartidores" role="tab" aria-controls="repartidores"
                aria-selected="true"  onclick="verRepartidores()">
                <img class="img-fluid" width="20%" src="resource/icons/repartidores.svg">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="administradores-tab" data-toggle="tab" href="#administradores" role="tab" aria-controls="administradores"
                aria-selected="false" onclick="verAdministradores()">
                <img src="resource/icons/administradores.svg" width="20%">
            </a>
        </li>

    </ul>
    <hr>
    <main>
        <div class="container tab-content">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: transparent;">
                        <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                        <li class="breadcrumb-item"><a>Empleados</a></li>
                        <li class="breadcrumb-item active" id="migasEmpleados"></li>
                    </ol>
                </nav>
            </div>
            <div class="container-fluid tab-pane active" id="repartidores" role="tabpanel" aria-labelledby="repartidores-tab">
                <div class="row mb-3">
                    <div class="col-1 mx-0">
                        <a class="btn btn-block btn-c1" data-toggle="modal" data-target="#modalRepartidores" 
                        onclick="intercalarBotones(false,'Repartidor')">
                            <i class="zmdi zmdi-plus"></i></a>
                    </div>
                    <div class="col-11 mx-0">
                        <input type="text" class="form-control" placeholder="Buscar Repartidor">
                    </div>                            
                </div>
                <div class="row mb-3 justify-content-center">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Id</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Transporte</th>
                                <th scope="col">Zona</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">Actualizar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tablaRepartidores">
                            
                        </tbody>
                    </table>
                    <div class="row justify-content-center" id="restRepartidores">
                            <button class="btn btn-default btn-lg">
                                <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x"></i>
                            </button>
                    </div>
                </div>
            </div>
            <div class="container-fluid tab-pane" id="administradores" role="tabpanel" aria-labelledby="administradores-tab">
                <div class="row mb-3">
                    <div class="col-1 mx-0">
                        <a class="btn btn-block btn-c1" data-toggle="modal" data-target="#modalAdministradores"
                        onclick="intercalarBotones(false,'Administrador')">
                            <i class="zmdi zmdi-plus"></i></a>
                    </div>
                    <div class="col-11 mx-0">
                        <input type="text" class="form-control" placeholder="Buscar Administrador">
                    </div>                            
                </div>
                <div class="row justify-content-center mb-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Id</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">Actualizar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tablaAdministradores">
                            
                        </tbody>
                    </table>
                    <div class="row justify-content-center" id="restAdministradores">
                            <button class="btn btn-default btn-lg">
                                <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x"></i>
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalRepartidores" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header color-blue">
                    <h5 class="modal-title" id="tituloRepartidor">Agregar Repartidor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idRepartidor" name="idRepartidor">
                    <form id="formularioRepartidor">
                        <input type="hidden" id="codigoRepartidor" name="codigoRepartidor">
                        <div class="form-group">
                            <label for="nombreRepartidor">Nombre<span style="color:red">*</span></label>
                            <input id="nombreRepartidor" name="nombreRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="correoRepartidor">Correo<span style="color:red">*</span></label>
                            <input id="correoRepartidor" name="correoRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group" id="contraR">
                            <label for="passwordRepartidor">Password<span style="color:red">*</span></label>
                            <input id="passwordRepartidor" name="passwordRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="identidadRepartidor">No. Identidad<span style="color:red">*</span></label>
                            <input id="identidadRepartidor" name="identidadRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="celularRepartidor">Celular<span style="color:red">*</span></label>
                            <input id="celularRepartidor" name="celularRepartidor" type="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccionRepartidor">Direccion<span style="color:red">*</span></label>
                            <input id="direccionRepartidor" name="direccionRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="transporte">Trasnporte<span style="color:red">*</span></label>
                            <input id="transporteRepartidor" name="transporteRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="zona">Zona<span style="color:red">*</span></label>
                            <input id="zonaRepartidor" name="zonaRepartidor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Sueldo<span style="color:red">*</span></label>
                            <input name="sueldoRepartidor" id="sueldoRepartidor" type="number" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-c1 cre-btn" onclick="crearRepartidor()" id="createDeliveryBtn">Agregar</button>
                    <button type="button" class="btn btn-c1 act-btn" onclick="actualizarRepartidor($('#idRepartidor').val())">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAdministradores" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  color-blue">
                    <h5 class="modal-title" id="tituloAdministrador">Agregar Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idAdministrador" id="idAdministrador">
                    <form id="formularioAdmi">
                        <input type="hidden" name="codigoAdministrador" id="codigoAdministrador">
                        <div class="form-group">
                            <label for="nombreAdministrador">Nombre</label>
                            <input name="nombreAdministrador" type="text" class="form-control" id="nombreAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="correoAdministrador">Correo</label>
                            <input name="correoAdministrador" type="text" class="form-control" id="correoAdministrador">
                        </div>
                        <div class="form-group" id="contraA">
                            <label for="passwordAdministrador">Password</label>
                            <input name="passwordAdministrador" type="text" class="form-control" id="passwordAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="identidadAdministrador">Identidad</label>
                            <input name="identidadAdministrador" type="text" class="form-control" id="identidadAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="celularAdministrador">Celular</label>
                            <input name="celularAdministrador" type="text" class="form-control" id="celularAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="direccionAdministrador">Direccion</label>
                            <input name="direccionAdministrador" type="text" class="form-control" id="direccionAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input name="cargoAdministrador" type="text" class="form-control" id="cargoAdministrador">
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Sueldo</label>
                            <input name="sueldoAdministrador" type="text" class="form-control" id="sueldoAdministrador">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnCrearAdmin" type="button" class="btn btn-c1 cre-btn2" onclick="crearAdministrador()">Agregar</button>
                    <button type="button" class="btn btn-c1 act-btn2" onclick="actualizarAdministrador($('#idAdministrador').val())">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark" style="color: white;"></footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/implementos.js"></script>
    <script src="js/controladores/empleados.js"></script>
    <script src="js/controladores/validacion.js"></script>
    <script type="text/javascript">
        verRepartidores();
    </script>
</body>

</html>