<?php 
    require_once('db_con.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = 'INSERT INTO usuarios VALUES (null, ?, ?, ?, ?, ?);';
        if($stmt = $mysqli->prepare($sql)){
            $json = file_get_contents('php://input');

            // Converts it into a PHP object
            $data = json_decode($json);
            // Bind variables to the prepared statement as parameters
            // Set parameters


            $stmt->bind_param(
                "sssss",
                $nombre,
                $apellido_paterno,
                $apellido_materno,
                $domicilio,
                $correo_electronico
            );

            $nombre = $data->nombre;
            $apellido_paterno = $data->apellido_paterno;
            $apellido_materno = $data->apellido_materno;
            $domicilio = $data->domicilio;
            $correo_electronico = $data->correo_electronico;

            
   
            header("Content-Type: application/json");
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                echo json_encode(array("err" => FALSE, "msj" => "Elemento creado"));
            }

            else{
                echo json_encode(array("err" => TRUE, "msj"=> $stmt->error));
            }
            exit();
        }
        // Close statement
    }
    $mysqli->close();
    exit();
?>