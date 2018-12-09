<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gesti&oacute;n de Entornos Salesforce - Bloqueo de Objeto</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h2>Bloqueo de objetos</h2>
            </div>
            <div class="row">

                <div class="col col-md-4 mt-1">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('blockObject/block'); ?>

                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-primary" onclick="multiple()">Multiple bloqueo</button>
                    </div>

                    <div class="form-group" id="name">
                        <label for="name">Nombre</label>
                        <input class="form-control" type="text" size="20" name="name"/>
					</div>

                    <div class="form-group" id="nameMultiple">
                      <label for="nameMultiple">Nombre</label>
                      <textarea class="form-control" name="nameMultiple" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select class="custom-select" id="type" name="type">
                            <option value="apexClass">Apex Class</option>
                            <option value="customField">Custom Field</option>
                            <option value="standardField">Standard Field</option>
                            <option value="customObject">Custom Object</option>
                            <option value="customMetadata">Custom Metadata</option>
                            <option value="customMetadataType">Custom Metadata Type</option>
                            <option value="pageLayouts">Page Layouts</option>
                            <option value="permissionSets">Permission Sets</option>
                            <option value="auraComponent">Aura Component</option>
                            <option value="recordType">Record Type</option>
                            <option value="profile">Profile</option>
                            <option value="processBuilder">Process Builder</option>
                            <option value="picklistValueSets">Picklist Value Sets</option>
                            <option value="button">Button</option>
                            <option value="report">Report</option>
                            <option value="reportType">Report Type</option>
                            <option value="quickAction">Quick Action</option>
                            <option value="user">User</option>
                            <option value="validationRule">Validation Rule</option>
                            <option value="translations">Traslations</option>
                            <option value="listView">List View</option>
                            <option value="lightningRecordPages">Lightning Record Pages</option>
                        </select>
					</div>

					<div class="form-group">
                        <label for="object">Objeto</label>
                        <input class="form-control" type="text" size="20" id="object" name="object"/>
					</div>

					<div class="form-group">
                        <label for="userStoryJira">Jira US</label>
                        <input class="form-control" type="text" size="20" id="userStoryJira" name="userStoryJira"/>
					</div>

					<div class="form-group">
						<label for="dev">DEV</label>
						<select class="custom-select" id="dev" name="dev">
                            <option value="R1F1">R1F1</option>
                        </select>
					</div>

                    <input type="submit" class="btn btn-primary" value="Block"/>
                    </form>
                </div>

                <div class="col col-md-8 mt-1">
                    <h3>Objetos bloqueados por tu usuario</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Objeto</th>
                                <th scope="col">Fecha de bloqueo</th>
                                <th scope="col">Jira US</th>
                                <th scope="col">Dev</th>
                                <th scope="col">Desbloqueo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (is_array($objectsByUser))
                                    log_message('debug', 'porque petas puta ' .print_r($objectsByUser, true));
                                    foreach ($objectsByUser as $key => $object){
                            ?>
                            <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $object->name ?></td>
                            <td><?= $object->type ?></td>
                            <td><?= $object->object ?></td>
                            <td><?= $object->blockeddate ?></td>
                            <td><?= $object->userStoryJira ?></td>
                            <td><?= $object->dev ?></td>
                            <td class="text-center">
                                <?php echo anchor('blockObject/unblock/'.$object->id, '<i class="far fa-times-circle"></i>', 'class="link-class"') ?>
                            </td>
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    <script>

        $(document).ready(function (){
            $('#nameMultiple').hide();
        });

        function multiple (){
            if ($('#nameMultiple').is(":visible")){
                $('#nameMultiple').hide();
                $('#name').show();
            } else {
                $('#nameMultiple').show();
                $('#name').hide();
            }
        }
    </script>
</html>