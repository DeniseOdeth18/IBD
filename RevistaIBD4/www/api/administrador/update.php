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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id_administrador = $data->id_administrador;
    
    // employee values
    $item->usuario = $data->usuario;
    $item->password = $data->password;
  
    
    if($item->updateEmployee()){
        echo json_encode("Administrador data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>