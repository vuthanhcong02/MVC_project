<?php
class PriceFormatter {
    public static function formatPrice($price) {
        // Định dạng giá cả với ký hiệu đô
        $formattedPrice = '$' . number_format($price, 2);

        return $formattedPrice;
    }
}
