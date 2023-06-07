<?php
session_start();
require_once 'database/Connect.php';
class Cart
{
    public function addToCart($productId, $name, $price, $quantity, $size, $color, $image)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $productExists = false;
    
        foreach ($_SESSION['cart'] as &$item) {
            // Kiểm tra nếu sản phẩm có cùng ID
            if ($item['productId'] === $productId) {
                // Kiểm tra nếu size và color trùng khớp
                if ($item['size'] === $size && $item['color'] === $color) {
                    // Sản phẩm trùng size và color, tăng số lượng
                    $item['quantity'] += $quantity;
                    $productExists = true;
                    break;
                }
            }
        }
    
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng hoặc không trùng size và color, thêm nó vào
        if (!$productExists) {
            $_SESSION['cart'][] = [
                'productId' => $productId,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'size' => $size,
                'color' => $color,
                'image' => $image,
            ];
        }
    }
            
    public function getCartItems()
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } else {
            return [];
        }
    }
    public function getTotalCartItems(){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            // Lấy số lượng từ session cart
            $cartQuantity = count($_SESSION['cart']);
            
            // Sử dụng biến $cartQuantity theo nhu cầu của bạn
            return  $cartQuantity;
        } 
    }
    public function getSubTotal(){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            $subtotal = 0; // Biến để lưu tổng tiền
            
            foreach($_SESSION['cart'] as $product){
                // Lấy giá tiền và số lượng từ mỗi sản phẩm trong giỏ hàng
                $price = $product['price'];
                $quantity = $product['quantity'];
                
                // Tính tổng giá tiền của sản phẩm (giá x số lượng)
                $productTotal = $price * $quantity;
                
                // Cộng tổng giá tiền của sản phẩm vào tổng tiền của giỏ hàng
                $subtotal += $productTotal;
            }
            
            // Sử dụng biến $subtotal theo nhu cầu của bạn
            return $subtotal;
        } else {
            return 0;
        }
    }
    function removeItemFromCart($productId) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['productId'] == $productId) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    session_write_close();
                    break;
                }
            }
            // Sắp xếp lại các khóa của mảng giỏ hàng
           
        }
    }
    // Các phương thức khác để cập nhật hoặc xóa sản phẩm trong giỏ hàng
    public function createOrder($fullname, $email, $phone, $address, $note,$date){
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "INSERT INTO hoa_don(fullname, email, phone, dia_chi_gh, note, ngay_lam_hd) 
                VALUES(:fullname, :email, :phone, :address, :note, :date)";
            $database->pdo($sql,['fullname'=>$fullname, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'note'=>$note, 'date'=>$date]);
            $orderId = $conn->lastInsertId();
            return $orderId;
        }
    }
    public function createOrderDetail($orderId, $productId, $size,$quantity,$price){ {
        // Lưu thông tin chi tiết hóa đơn vào bảng "Chi tiết hóa đơn"
        $database = new DatabaseConnection();
        $conn = $database->getConnection();
        if($conn){
            $sql = "INSERT INTO chi_tiet_hoa_don(id_hoadon,ma_sp, size, so_luong, don_gia) 
                VALUES(:id_hoadon, :ma_sp, :size, :quantity, :price)";
            $database->pdo($sql,['id_hoadon'=>$orderId, 'ma_sp'=>$productId, 'size'=>$size, 'quantity'=>$quantity, 'price'=>$price]);
        }
      }
    }
}
