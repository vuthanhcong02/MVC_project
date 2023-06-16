<?php
require_once 'database/Connect.php';
class Order{
    public function getAllOrders(){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "SELECT chi_tiet_hoa_don.size,chi_tiet_hoa_don.so_luong,chi_tiet_hoa_don.ma_sp as id_sp,chi_tiet_hoa_don.id as id_chi_tiet_hd,
                            hoa_don.ma_hd,hoa_don.ngay_lam_hd,hoa_don.dia_chi_gh,hoa_don.fullname,hoa_don.phone,hoa_don.email,hoa_don.note,
                            product.id,product.name,product.image,product.price,
                            order_status.status ,order_status.id_status
                    
                    FROM `chi_tiet_hoa_don` JOIN hoa_don ON chi_tiet_hoa_don.id_hoadon = hoa_don.ma_hd 
                                            JOIN product ON chi_tiet_hoa_don.ma_sp = product.id 
                                            JOIN order_status ON chi_tiet_hoa_don.id_order_status = order_status.id_status
                                            "
                                            ;
            $orders = $database->pdo($sql);
            return $orders;
        }
    }
    public function upadateStatus($id, $status){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "UPDATE chi_tiet_hoa_don 
                    JOIN order_status ON chi_tiet_hoa_don.id_order_status = order_status.id_status
                    SET id_order_status = :id_order_status 
            WHERE chi_tiet_hoa_don.id = :id";
            $order = $database->pdo($sql,['id'=>$id,'id_order_status'=>$status]);
        }
    }
    public function getOrderById($id){
        $databse = new DatabaseConnection();
        $conn = $databse->getConnection();
        if($conn){
            $sql = "SELECT chi_tiet_hoa_don.size,chi_tiet_hoa_don.so_luong,hoa_don.ma_hd,chi_tiet_hoa_don.id_order_status as id_status,
                            chi_tiet_hoa_don.ma_sp as id_sp,chi_tiet_hoa_don.id as id_chi_tiet_hd,
                            hoa_don.ngay_lam_hd,hoa_don.dia_chi_gh,hoa_don.fullname,hoa_don.phone,hoa_don.email,hoa_don.note,
                            product.id,product.name,product.image,product.price, 
                            order_status.status as status,order_status.id_status
                    
                    FROM `chi_tiet_hoa_don` JOIN hoa_don ON chi_tiet_hoa_don.id_hoadon = hoa_don.ma_hd 
                                                    JOIN product ON chi_tiet_hoa_don.ma_sp = product.id
                                                    JOIN order_status ON chi_tiet_hoa_don.id_order_status = order_status.id_status
                                                     WHERE chi_tiet_hoa_don.id = :id";
            $order = $databse->pdo($sql,['id'=>$id])->fetch();
            return $order;
        }
    }
    public function deleteOrder($id){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql ="DELETE FROM chi_tiet_hoa_don WHERE chi_tiet_hoa_don.id = :id";
            $database->pdo($sql,['id'=>$id]);
        }
    }
}