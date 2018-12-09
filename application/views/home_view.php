<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />
        <link href="<?php echo site_url('css/open-iconic/font/css/open-iconic-bootstrap.css') ?>" rel="stylesheet" />
        <title>Gesti&oacute;n de Entornos CRM - Compilaci&oacute;n</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <h1>Bienvenido <?php echo $username; ?>!</h1>
            </div>
            <div class="row justify-content-md-center mt-4">
                <a class="btn btn-primary" href="index.php/BlockObject">
                    <span class="oi oi-arrow-thick-top"></span>
                    Bloquear
                </a>
            </div>
            <div class="row justify-content-md-center mt-3">
                <a class="btn btn-primary" href="historial">
                    <span class="oi oi-list"></span>
                    Historial
                </a>
            </div>
            <div class="row justify-content-md-center mt-3">
                <a class="btn btn-primary" href="perfil">
                    <span class="oi oi-person"></span>
                    Perfil
                </a>
            </div>
            <div class="row justify-content-md-center mt-3">
                <a class="btn btn-danger" href="home/logout">
                    <span class="oi oi-account-logout"></span>
                    Logout
                </a>
            </div>
        </div>
    </body>
</html>