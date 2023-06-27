<?php
require_once 'database/Connect.php';
class Product{
    public function getAllProducts(){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
           $sql = "SELECT product.id, product.name, product.image, product.price, product.description,category.name as category, product_status.name as status
                    FROM product 
                    JOIN category ON product.category_id = category.id 
                    JOIN product_status ON product.status_id = product_status.id
                    ORDER BY product.id DESC";
           $products = $database->pdo($sql)->fetchAll();
           return $products; 
        }
    }
    public function newProduct($name,$image,$price,$description,$category_id,$status_id){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "INSERT INTO product(name,image,price,description,category_id,status_id)
                    VALUES(:name,:image,:price,:description,:category_id,:status_id)";
            $database->pdo($sql,['name'=>$name,
                                'image'=>$image,
                                'price'=>$price,
                                'description'=>$description,
                                'category_id'=>$category_id,
                                'status_id'=>$status_id]);
        }
    }
    public function getProductById($id){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "SELECT * FROM product WHERE id = :id";
            $product = $database->pdo($sql,['id'=>$id])->fetch();
            return $product;
        }
    }
    public function updateProduct($id,$name,$image,$price,$description,$category_id,$status_id){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "UPDATE product SET name = :name, image = :image, price = :price, description = :description, category_id = :category_id, status_id = :status_id WHERE id = :id";
            $database->pdo($sql,['name'=>$name,
                                'image'=>$image,
                                'price'=>$price,
                                'description'=>$description,
                                'category_id'=>$category_id,
                                'status_id'=>$status_id,
                                'id'=>$id]);
        }
    }
    public function deleteProduct($id){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "DELETE FROM product WHERE id = :id";
            $database->pdo($sql,['id'=>$id]);
        }
    }
}