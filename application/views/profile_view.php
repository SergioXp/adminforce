<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gesti&oacute;n de Entornos Salesforce - Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <h1>Perfil</h1>
            </div>
            <div class="row justify-content-md-center">

                <div class="col col-md-4 mt-1">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('Profile_Controller/updateProfile'); ?>
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input class="form-control" type="text" size="20" value="<?= $userData[0]->User ?>" id="username" name="username"/>

                    </div>
					<div class="form-group">
                        <label for="username">Nombre:</label>
                        <input class="form-control" type="text" size="20" value="<?= $userData[0]->Name ?>" id="name" name="name"/>

                    </div>
					<div class="form-group">
                        <label for="username">Email:</label>
                        <input class="form-control" type="email" size="20" value="<?= $userData[0]->Email ?>" id="email" name="email"/>

                    </div>
					<div class="form-group">
                        <label for="username">Dev:</label>
                        <input class="form-control" type="text" size="20" value="<?= $userData[0]->Dev ?>" id="dev" name="dev"/>

                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" size="20" id="password" name="password"/>
                    </div>

					<div class="form-group">
                        <label for="passwordRepeat">Repetir Password:</label>
                        <input class="form-control" type="password" size="20" id="passwordRepeat" name="passwordRepeat"/>
                    </div>
                    <input type="submit" class="btn btn-success" value="Actualizar"/>
                    <a class="btn btn-warning" href="<?php echo site_url() ?>">Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>