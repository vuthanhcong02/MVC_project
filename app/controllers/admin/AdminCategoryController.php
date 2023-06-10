<?php
require_once 'app/models/admin/AdminCategory.php';
require_once 'app/models/user/Category.php';
class AdminCategoryController{
    public function index(){
        $categoryModelUser = new Category();
        $categories = $categoryModelUser->getAllCategory();
        include 'app/views/admin/category_Manager/index.php';
    }
    public function add(){
        // if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
            $name = $_POST['name'];
            $created_at = $_POST['created_at'];
            $categoryModelAdmin = new AdminCategory();
            $categoryModelAdmin->add($name,$created_at);
            header('Location: index.php?controller=admincategory&action=index');
        // }
    }
    public function edit(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoryModelAdmin = new AdminCategory();
            $category = $categoryModelAdmin->getCategoryById($id);
            include 'app/views/admin/category_Manager/edit.php';
        }
    }
    public function update(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $created_at = $_POST['created_at'];
            $categoryModelAdmin = new AdminCategory();
            $categoryModelAdmin->update($id,$name,$created_at);
            header('Location: index.php?controller=admincategory&action=index');
        }
    }
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoryModelAdmin = new AdminCategory();
            $categoryModelAdmin->delete($id);
            header('Location: index.php?controller=admincategory&action=index');
        }
    }
}