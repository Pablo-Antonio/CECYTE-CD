<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/Assets/img/logo.png" sizes="30x30">

    <script src="<?= base_url() ?>/Assets/js/jquery-3.6.3.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="StyleSheet" href="<?= base_url() ?>/Assets/css/estilos.css">

    <title>Inicio de sesión</title>
</head>

<body>
    <!--*******-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" id="Titulo" href="">CECyTE 02 Yecapixtla</a>
    </nav>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Inventario Plantel Yecapixtla-Programación</li>
    </ol>
    <!--*******-->

    <!--action="login.php" method="POST"-->
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="<?= base_url() ?>/Assets/img/logo.png">
                </div>
                <form class="col-12" autocomplete="off" id="formLogueo">
                    <div class="form-group" id="user-group">
                        <label>Nombre de usuario</label>
                        <input type="text" class="form-control" name="usr" id="usr" placeholder="Nombre de usuario" />
                        <!--required-->
                    </div>
                    <div class="form-group" id="contraseña-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" />
                        <!--required-->
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Ingresar
                    </button><br><br>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-dark mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; CECyTE Yecapixtla 2021</div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url() ?>/Assets/js/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/Assets/js/helpers.js"></script>
    <script src="<?= base_url() ?>/Assets/js/functions_index.js"></script>

</body>

</html>