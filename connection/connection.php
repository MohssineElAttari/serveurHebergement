<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Connection {

    private $conn;
    private $connextion;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'hebergements_db';
        $login = 'root';
        $password = '';
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
            $this->conn->query("SET NAMES UTF8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function getConn() {
        return $this->conn;
    }

}
