<?php
    require_once('./db_con.php');

    $sql = 'SELECT * FROM usuarios';
    if ($result = $mysqli->query($sql)) {
        $arr = array();
        if($result->num_rows > 0) {
            while($row =$result->fetch_array()){
                array_push(
                    $arr,
                    array(
                        "id" => $row['id'],
                        "nombres" => $row['nombres'],
                        "apellido_paterno" => $row['apellido_paterno'],
                        "apellido_materno" => $row['apellido_materno'],
                        "domicilio" => $row['domicilio'],
                        "correo_electronico" => $row['correo_electronico'] ));
            }
            echo json_encode($arr);
        }
    }
?>