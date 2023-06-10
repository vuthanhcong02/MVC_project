<?php
require_once 'app/models/admin/Account.php';

class AdminAccountController{
    public function index(){
        $accountModel = new Account();
        $accounts = $accountModel->getAllAccount();
        include 'app/views/admin/user_Manager/index.php';
    }
    public function add(){
        if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $accountModel = new Account();
            $accountModel->add($username,$password,$role);
            header('Location: index.php?controller=adminaccount&action=index');
        }
    }
    public function edit(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $accountModel = new Account();
            $account = $accountModel->getAccountById($id);
            include 'app/views/admin/user_Manager/edit.php';
        }
    }
    public function update(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $accountModel = new Account();
            $accountModel->update($id,$username,$password,$role);
            header('Location: index.php?controller=adminaccount&action=index');
        }
    }
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $accountModel = new Account();
            $accountModel->delete($id);
            header('Location: index.php?controller=adminaccount&action=index');
        }
    }
}