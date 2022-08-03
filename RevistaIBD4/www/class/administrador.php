<?php
    class Administrador{

        // Connection
        private $conn;

        // Table
        private $db_table = "administrador";

        // Columns
        public $id_administrador;
        public $usuario;
        public $password;
     

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAdministrador(){
            try {

                //$sqlQuery = "SELECT id_administrador, usuario, password FROM " . $this->db_table ;

                $sqlQuery = "select * from administrador";

                $stmt = $this->conn->prepare($sqlQuery);
                //$stmt->execute();
                // return $stmt;

                echo "Holaa";
    
                return;
               
            } catch (Exception $e) {
                echo "Error";
                return  $e->getMessage() ;
            }
           
        }

   

        public function getEmployees(){
            $sqlQuery = "SELECT id, name, email, age, designation, created FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createAdministrador(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    id_administrador = :id_administrador, 
                    usuario = :usuario, 
                    password = :password";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->id_administrador=htmlspecialchars(strip_tags($this->id_administrador));
            $this->usuario=htmlspecialchars(strip_tags($this->usuario));
            $this->password=htmlspecialchars(strip_tags($this->password));
            
        
            // bind data
            $stmt->bindParam(":id_administrador", $this->id_administrador);
            $stmt->bindParam(":usuario", $this->usuario);
            $stmt->bindParam(":password", $this->password);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        public function getSingleAdministrador(){
            $sqlQuery = "SELECT
                        id_administrador, 
                        usuario, 
                        password
                     
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id_administrador = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id_administrador);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->usuario = $dataRow['usuario'];
            $this->password = $dataRow['password'];
            
        }        

        // UPDATE
        public function updateAdministrador(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        usuario = :usuario, 
                        password = :password
                    WHERE 
                    id_administrador = :id_administrador";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->usuario=htmlspecialchars(strip_tags($this->usuario));
            $this->password=htmlspecialchars(strip_tags($this->password));
          
        
            // bind data
            $stmt->bindParam(":usuario", $this->usuario);
            $stmt->bindParam(":password", $this->password);
       
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteAdministrador(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id_administrador = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id_administrador=htmlspecialchars(strip_tags($this->id_administrador));
        
            $stmt->bindParam(1, $this->id_administrador);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>