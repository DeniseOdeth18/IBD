<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "IBDRevista";
        private $username = "root";
        private $password = "root";

        public $conn;

        public function getConnection(){

            $this->conn = null;

            echo "Todo bien";
            return;
            try{

                
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                //$this->conn = new PDO('mysql:host=localhost;port=8889;dbname=IBDRevista;charset=utf8mb4','root','root');
                $this->conn->exec("set names utf8");

               
                
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    } 
?>