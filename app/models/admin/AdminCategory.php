<?php
require_once 'database/Connect.php';
class AdminCategory{
    public function add($name, $created_at) {
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "INSERT INTO category (name, created_at) VALUES (:name, :created_at)";
            $new = $database->pdo($sql, ['name' => $name, 'created_at' => $created_at]);
        }
    }
    public function getCategoryById($id) {
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "SELECT * FROM category WHERE id = :id";
            $category = $database->pdo($sql, ['id' => $id])->fetch();
            return $category;
        }
    }
    public function update($id, $name, $created_at) {
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "UPDATE category SET name = :name, created_at = :created_at WHERE id = :id";
            $database->pdo($sql, ['name' => $name, 'created_at' => $created_at, 'id' => $id]);
        }
    }
    public function delete($id) {
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "DELETE FROM category WHERE id = :id";
            $database->pdo($sql, ['id' => $id]);
        }
    }
}