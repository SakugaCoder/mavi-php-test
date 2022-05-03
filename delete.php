<?php 
    require_once('db_con.php');

    $sql = 'DELETE FROM usuarios WHERE id = ?';
    if($stmt = $mysqli->prepare($sql)){
        $json = file_get_contents('php://input');

        $data = json_decode($json);
        $stmt->bind_param("i", $id);
        $id = $data->id;
        

        header("Content-Type: application/json");
        if($stmt->execute()){
            echo json_encode(array("err" => FALSE, "msj" => "Elemento borrado"));
        }

        else{
            echo json_encode(array("err" => TRUE, "msj" => $stmt->error));
        }
        exit();
    }    
    $mysqli->close();
    exit();
?>