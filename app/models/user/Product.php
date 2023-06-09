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
    public function getAllProduct($perPage,$offset){
        $conn = new DatabaseConnection();
        $sql="SELECT *,product.name as product_name FROM product LIMIT :perPage OFFSET :offset";
        $products = $conn->pdo($sql,['perPage'=>$perPage,'offset'=>$offset])->fetchAll();
        return $products;
    }
    public function getTotalProduct(){
        $database = new DatabaseConnection();
        $sql="SELECT COUNT(*) as total FROM product";
        $totalProduct = $database->pdo($sql)->fetch();
        return $totalProduct['total'];
    }
    public function getAllProductTrendy($perPage_Trendy,$offset_Trendy){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE status_id = '2' LIMIT :perPage OFFSET :offset";
        $trendy = $conn->pdo($sql,['perPage'=>$perPage_Trendy,'offset'=>$offset_Trendy])->fetchAll();
        return $trendy;
    }
    public function getTotalProductTrendy(){
        $conn = new DatabaseConnection();
        $sql="SELECT COUNT(*) as total FROM product WHERE status_id = '2'";
        $totalProduct = $conn->pdo($sql)->fetch();
        return $totalProduct['total'];
    }
    public function getAllProductNew($perPage_New,$offset_New){
        $conn = new DatabaseConnection();
        $sql="SELECT * FROM product WHERE status_id = '3' LIMIT :perPage OFFSET :offset";
        $product_new = $conn->pdo($sql,['perPage'=>$perPage_New,'offset'=>$offset_New])->fetchAll();
        return $product_new;
    }
    public function getTotalProductNew(){
        $conn = new DatabaseConnection();
        $sql="SELECT COUNT(*) as total FROM product WHERE status_id = '3'";
        $totalProduct = $conn->pdo($sql)->fetch();
        return $totalProduct['total'];
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
        $conn = $database->getConnection();
        if($conn){
            $sql="SELECT *,product.name as product_name FROM product WHERE category_id=:category_id";
            $products = $database->pdo($sql,['category_id'=>$category_id])->fetchAll();
            return $products;
        }
    }
    public function searchProduct($keyword){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "SELECT product.id, product.name as product_name, product.image, product.price,category.name
            FROM product
            JOIN category ON product.category_id = category.id
            WHERE product.name LIKE CONCAT('%', :keyword, '%') OR category.name LIKE CONCAT('%', :keyword1, '%')";
            $products_search = $database->pdo($sql, ['keyword' => $keyword,'keyword1' => $keyword])->fetchAll();
            return $products_search;
        }        
    }
    public function getProductByPrice($min_price,$max_price){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if ($conn) {
            $sql = "SELECT product.id, product.name as product_name, product.image, product.price,category.name
            FROM product
            JOIN category ON product.category_id = category.id
            WHERE :min_price <= product.price AND product.price <= :max_price";
            $products = $database->pdo($sql, ['min_price' => $min_price, 'max_price' => $max_price])->fetchAll();
            return $products;
        }
    }
}