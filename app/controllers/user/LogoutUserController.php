<?php
session_start();
class LogoutUserController{
    public function index(){
        unset($_SESSION['user']);
        header('Location: index.php?controller=home&action=index');
    }
}