<?php
require_once 'database/Connect.php';
class Account{
    public function getAccount($username,$password){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql= "SELECT * FROM customers WHERE username = :username AND password = :password";
            $account = $database->pdo($sql,[':username'=>$username,':password'=>$password])->fetch();
            return $account; 
        }

    }
    public function newAccount($username,$email,$password){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql= "INSERT INTO customers (username,email,password) VALUES (:username,:email,:password)";
            $account = $database->pdo($sql,[':username'=>$username,':email'=>$email,':password'=>$password])->fetch();
            return $account;
        }
    }
}