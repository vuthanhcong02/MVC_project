<?php 
require_once 'database/Connect.php';
class Account{
   public function getAllAccount(){
       $database = new DatabaseConnection();
       $conn = $database->getConnection();
       if ($conn) {
           $sql = "SELECT * FROM customers ORDER BY id DESC";
           $accounts = $database->pdo($sql)->fetchAll();
           return $accounts;
       }
   }
   public function getAccountById($id){
       $database = new DatabaseConnection();
       $conn = $database->getConnection();
       if ($conn) {
           $sql = "SELECT * FROM customers WHERE id = :id";
           $account = $database->pdo($sql, ['id' => $id])->fetch();
           return $account;
       }
   }
   public function add($username, $password, $role){
       $database = new DatabaseConnection();
       $conn = $database->getConnection();
       if ($conn) {
           $sql = "INSERT INTO customers (username, password, role) VALUES (:username, :password, :role)";
           $new = $database->pdo($sql, ['username' => $username, 'password' => $password, 'role' => $role]);
       }
   }
   public function update($id, $username, $password, $role){
       $database = new DatabaseConnection();
       $conn = $database->getConnection();
       if ($conn) {
           $sql = "UPDATE customers SET username = :username, password = :password, role = :role WHERE id = :id";
           $database->pdo($sql, ['username' => $username, 'password' => $password, 'role' => $role, 'id' => $id]);
       }
   }
   public function delete($id){
       $database = new DatabaseConnection();
       $conn = $database->getConnection();
       if ($conn) {
           $sql = "DELETE FROM customers WHERE id = :id";
           $database->pdo($sql, ['id' => $id]);
       }
   }
}