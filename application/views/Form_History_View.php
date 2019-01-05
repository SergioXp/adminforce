<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gesti&oacute;n de Entornos Salesforce - Bloqueo de Objeto</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h1>Historial de Objetos</h1>
            </div>
            <div class="row">

                <div class="col col-md-12 mt-5">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" onclick="search()" id="button-addon1">Buscar</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar objeto" onkeypress="prueba(event)" aria-label="" aria-describedby="button-addon1" id="searchText">
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Objeto</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Usuario Bloqueo</th>
                                <th scope="col">Fecha bloqueo</th>
                                <th scope="col">Fecha desbloqueo</th>
                                <th scope="col">Dev</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (is_array($objectsByUser)) {
                                    foreach ($objectsByUser as $key => $object){
                            ?>
                            <tr>
                            <th scope="row"><?= $object->id ?></th>
                            <td><?= $object->name ?></td>
                            <td><?= $object->type ?></td>
                            <td><?= $object->object ?></td>
                            <td><?= $object->action ?></td>
                            <td><?= $object->username ?></td>
                            <td><?= $object->blockeddate ?></td>
                            <td><?= $object->unblockeddate ?></td>
                            <td><?= $object->dev ?></td>
                            </tr>
                                    <?php }
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>

            <div class='row justify-content-end'>
                <a class="btn btn-warning" href="<?php echo site_url() ?>">Atrás</a>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        function search(){
            var searchText = $('#searchText').val();
            if (searchText != ''){
                var url = "<?php echo site_url('History_Controller/find/" + searchText +"'); ?>";
                window.location = url;
            } else {
                window.location = "<?php echo site_url('History_Controller'); ?>";
            }
        }

        function prueba(e){
            if (e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault();
                search();
            }
        }
    </script>
</html>