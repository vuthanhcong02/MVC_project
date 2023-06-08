<?php 
require_once 'database/Connect.php';
class Category{
    private $id;
    private $name;
    private $created_at;
    public function __construct(){
        // $this->id = $id;
        // $this->name = $name;
        // $this->created_at = $created_at;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function getAllCategory(){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM category";
        $categories = $conn->pdo($sql)->fetchAll();
        return $categories;
    }
}