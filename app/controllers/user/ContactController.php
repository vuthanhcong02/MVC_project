<?php
require_once 'app/models/user/Category.php';
class ContactController{
    public function index (){
        $categoryModel = new Category();
        $categories  = $categoryModel->getAllCategory();
        include 'app/views/contact/index.php';
    }
}