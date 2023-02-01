<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="PvSystems">

    <link rel="icon" type="image/png" href="<?= base_url() ?>/Assets/img/logo.png" sizes="30x30">

    <title>CECyTE 02 Yecapixtla</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>/Assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url() ?>/Assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>/Assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>/Assets/css/style-responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>/Assets/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>/Assets/css/table-responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/Assets/js/plugins/sweetalert/sweetalert2.min.css">

</head>

<body>

    <section id="container">
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="" class="logo"><b>CECyTE 02 Yecapixtla</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/logOut">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href=""><img src="<?= base_url() ?>/Assets/img/admin.png" class="img-circle" width="60"></a></p>
                    <h5 class="centered">Administrador</h5>

                    <li class="sub-menu">
                        <a href="/Inventario" id="liInventario">
                            <i class="fa fa-list"></i>
                            <span>Inventario</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="/Prestamos" id="liPrestamos">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Prestamos</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="/Incidencias" id="liIncidencias">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Incidencias</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->