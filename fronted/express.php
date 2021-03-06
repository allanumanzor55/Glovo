<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Express</title>
</head>

<body class="container">
    <nav class="navbar justify-content-between mt-4">
        <a class="navbar-brand top" style="color: white;">
            <img src="resource/icons/glovo-logo-2.svg" class="img-fluid" width="130px">
        </a>
        <form class="form-inline font-1">
            <a class="btn btn-c1 btn-radius my-2 mx-1 py-2 px-3 shadow">
                Registrarse
            </a>
            <a class="btn btn-light btn-radius my-2 mx-1 p-2 shadow" style="color: rgb(39, 37, 37);">
                Iniciar sesion
            </a>
        </form>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: transparent;">
            <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
            <li class="breadcrumb-item active"><a>Express</a></li>
        </ol>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <article>
                        <h2 class="h2">Resumen De Pedido</h2>
                        <h1 class="display-5"> Entregamos Lo Que Quieras Cuando Quieras</h1>
                    </article>
                    <form>
                        <label for="#pedido">Pedido:</label>
                        <textarea type="text" class="form-control" id="pedido"></textarea>
                        <label for="">Direccion:</label>
                        <input type="text" class="form-control" id="direccion">
                        <label for="">Receptor:</label>
                        <input type="text" class="form-control" id="receptor">
                    </form>
                </div>
                <div class="col-6">
                    <div class="jumbotron">
                        <article>
                            <h2 class="h2">Detalles De Pedido</h2>
                            <h3 class="h3 text-muted">Precio: 99.99$$</h3>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registrarse En Glovo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark mt-5" style="color: white;"></footer>
    <script src="js/axios.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/implementos.js"></script>
</body>
</html>