<?php 
    require_once('db_con.php');
    $sql = 'UPDATE usuarios SET nombres = ?, apellido_paterno = ?, apellido_materno = ?, domicilio = ?, correo_electronico = ? WHERE id = ?;';
    if($stmt = $mysqli->prepare($sql)){
        $json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($json);
        // Bind variables to the prepared statement as parameters
        // Set parameters


        $stmt->bind_param(
            "ssssss",
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $domicilio,
            $correo_electronico,
            $id
        );

        $nombre = $data->nombre;
        $apellido_paterno = $data->apellido_paterno;
        $apellido_materno = $data->apellido_materno;
        $domicilio = $data->domicilio;
        $correo_electronico = $data->correo_electronico;
        $id = $data->id;
        

        header("Content-Type: application/json");
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records created successfully. Redirect to landing page
            echo json_encode(array("err" => FALSE, "msj" => "Elemento editado"));
        }

        else{
            echo json_encode(array("err" => TRUE, "msj"=> $stmt->error));
        }
        exit();
    }
    echo $stmt . "HEY";
    // Close statement
    
    $mysqli->close();
    exit();
?>