<?php
require_once 'database/Connect.php';
class Order{
    public function getAllOrders(){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "SELECT chi_tiet_hoa_don.size,chi_tiet_hoa_don.so_luong,
                            hoa_don.ma_hd,hoa_don.ngay_lam_hd,hoa_don.dia_chi_gh,hoa_don.status,hoa_don.fullname,hoa_don.phone,hoa_don.email,hoa_don.note,
                            product.name,product.image,product.price
                    
                    FROM `chi_tiet_hoa_don` JOIN hoa_don ON chi_tiet_hoa_don.id_hoadon = hoa_don.ma_hd 
                                                    JOIN product ON chi_tiet_hoa_don.ma_sp = product.id";
            $orders = $database->pdo($sql);
            return $orders;
        }
    }
    public function upadateStatus($id, $status){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "UPDATE hoa_don SET status = :status WHERE ma_hd = :id";
            $order = $database->pdo($sql,['id'=>$id,'status'=>$status]);
        }
    }
    public function getOrderById($id){
        $databse = new DatabaseConnection();
        $conn = $databse->getConnection();
        if($conn){
            $sql = "SELECT chi_tiet_hoa_don.size,chi_tiet_hoa_don.so_luong,hoa_don.ma_hd,
                            hoa_don.ngay_lam_hd,hoa_don.dia_chi_gh,hoa_don.status,hoa_don.fullname,hoa_don.phone,hoa_don.email,hoa_don.note,
                            product.name,product.image,product.price
                    
                    FROM `chi_tiet_hoa_don` JOIN hoa_don ON chi_tiet_hoa_don.id_hoadon = hoa_don.ma_hd 
                                                    JOIN product ON chi_tiet_hoa_don.ma_sp = product.id WHERE hoa_don.ma_hd = '$id'";
            $order = $databse->pdo($sql)->fetch();
            return $order;
        }
    }
}