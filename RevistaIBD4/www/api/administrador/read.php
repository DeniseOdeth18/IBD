<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../class/administrador.php';


    
    $database = new Database();
    
    $db = $database->getConnection();
    
    //$items = new Administrador($db);
  
    //$stmt = $items->getAdministrador();
  
    echo $db;
    return;

    $itemCount = $stmt->rowCount();
    


    // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $administradorArr = array();
        $administradorArr["body"] = array();
        $administradorArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id_adminisrador" => $id_administrador,
                "usuario" => $usuario,
                "password" => $password
              
            );

            array_push($administradorArr["body"], $e);
        }

        echo json_encode($administradorArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>