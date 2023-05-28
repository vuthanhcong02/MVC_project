<?php 
require_once 'database/Connect.php';
class Product {
    private $id;
    private $name;
    private $price;
    private $image;
    private $description;
    private $category_id;
    private $created_at;
    private $status;
    public function __construct(){
        // $this->id = $id;
        // $this->name = $name;
        // $this->price = $price;
        // $this->image = $image;
        // $this->description = $description;
        // $this->category_id = $category_id;
        // $this->created_at = $created_at;
        // $this->status = $status;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getImage(){
        return $this->image;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getCategory_id(){
        return $this->category_id;
    }
    public function getCreated_at(){
        return $this->created_at;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setCategory_id($category_id){
        $this->category_id = $category_id;
    }
    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getAllProduct(){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product";
        $products = $conn->pdo($sql)->fetchAll();
        return $products;
    }
    public function getAllProductTrendy(){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE status = 'trendy'";
        $trendy = $conn->pdo($sql)->fetchAll();
        return $trendy;
    }
    public function getAllProductNew(){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE status = 'new'";
        $product_new = $conn->pdo($sql)->fetchAll();
        return $product_new;
    }
    public function getProductById($id){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE product.id = :id";
        $product = $conn->pdo($sql,['id'=>$id])->fetch();
        return $product;
    }
    public function getProductRelative($category_id,$id){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE category_id=:category_id AND product.id !=:id";
        $products = $conn->pdo($sql,['category_id'=>$category_id,'id'=>$id])->fetchAll();
        return $products;
    }
    public function getProductByCategory($category_id){
        $database = new DatabaseConnection();
        // $conn = $database->getConnection();
        // if($conn){
            $sql="SELECT * FROM product WHERE category_id=:category_id";
            $products = $database->pdo($sql,['category_id'=>$category_id])->fetchAll();
            return $products;
        // }
    }
}