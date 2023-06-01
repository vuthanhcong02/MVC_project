<?php
session_start();
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
    // Các phương thức khác để cập nhật hoặc xóa sản phẩm trong giỏ hàng
}
