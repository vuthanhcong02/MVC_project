<?php
require_once 'database/Connect.php';
class ProductStatus{
    public function getAllProductStatus(){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "SELECT * FROM product_status";
            $statuses = $database->pdo($sql);
            return $statuses;
        }
    }
}