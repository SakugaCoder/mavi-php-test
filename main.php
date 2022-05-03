<?php
require_once('./db_con.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <h3>Crear usuario</h3>
    <form id="nuevo-usuario" onsubmit="createUser(event);">
        <div class="form-item">
            <label>
                <p>Nombre</p>
                <input type="text" placeholder="Nombre" name="nombres" id="nombres">
            </label>
        </div>

        <div class="form-item">
            <label>
                <p>Apellido paterno</p>
                <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" id="apellido_paterno">
            </label>
        </div>

        <div class="form-item">
            <label>
                <p>Apellido materno</p>
                <input type="text" placeholder="Apellido Materno" name="apellido_materno" id="apellido_materno">
            </label>
        </div>

        <div class="form-item">
            <label>
                <p>Domicilio</p>
                <input type="text" placeholder="Domicilio" name="domicilio" id="domicilio">
            </label>
        </div>

        <div class="form-item">
            <label>
                <p>Correo electronico</p>
                <input type="text" placeholder="Correo electronico" name="correo_electronico" id="correo_electronico">
            </label>
        </div>

        <p class="error-msj red-text text-darken-2"></p>

        <button type="submit" class="waves-effect waves-light btn-large">Guardar</button>
    </form>

    <div class="striped responsive-table" style="margin-top: 40px">
        <h3>Lista de usuarios</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Paterno</th>
                    <th>Domicilio</th>
                    <th>Correo electronico</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody id="user-table">
            </tbody>
        </table>
    </div>



    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Editar usuario</h4>
            <form id="editar-usuario" onsubmit="updateUser(event);">
                <input type="hidden" name="id" id="e_id">

                <div class="form-item">
                    <label>
                        <p>Nombre</p>
                        <input type="text" placeholder="Nombre" name="nombres" id="e_nombres">
                    </label>
                </div>

                <div class="form-item">
                    <label>
                        <p>Apellido paterno</p>
                        <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" id="e_apellido_paterno">
                    </label>
                </div>

                <div class="form-item">
                    <label>
                        <p>Apellido materno</p>
                        <input type="text" placeholder="Apellido Materno" name="apellido_materno" id="e_apellido_materno">
                    </label>
                </div>

                <div class="form-item">
                    <label>
                        <p>Domicilio</p>
                        <input type="text" placeholder="Domicilio" name="domicilio" id="e_domicilio">
                    </label>
                </div>

                <div class="form-item">
                    <label>
                        <p>Correo electronico</p>
                        <input type="text" placeholder="Correo electronico" name="correo_electronico" id="e_correo_electronico">
                    </label>
                </div>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <button type="submit" class="modal-close waves-effect waves-light btn-large">Guardar</button>

            </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./index.js"></script>
</body>

</html>