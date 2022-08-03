<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/administrador.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Administrador($db);

    $item->id_administrador = isset($_GET['id_administrador']) ? $_GET['id_administrador'] : die();
  
    $item->getSingleAdministrador();

    if($item->usuario != null){
        // create array
        $administrador_arr = array(
            "id_administrador" =>  $item->id_administrador,
            "usuario" => $item->usuario,
            "password" => $item->password
          
        );
      
        http_response_code(200);
        echo json_encode($administrador_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
?>