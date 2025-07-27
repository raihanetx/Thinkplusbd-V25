<?php
$input = json_decode(file_get_contents('php://input'), true);
$coupon_code = isset($input['coupon_code']) ? trim($input['coupon_code']) : '';
$cart_items = isset($input['cart']) ? $input['cart'] : [];

if (!empty($coupon_code) && !empty($cart_items)) {
    $coupons_file_path = __DIR__ . '/coupons.json';
    if (file_exists($coupons_file_path)) {
        $coupons_json = file_get_contents($coupons_file_path);
        $coupons = json_decode($coupons_json, true);
        foreach ($coupons as $coupon) {
            if ($coupon['code'] === $coupon_code) {
                $total_discount = 0;
                $original_total = 0;
                foreach ($cart_items as $item) {
                    $original_total += $item['price'] * $item['quantity'];
                    $apply_discount = false;
                    if ($coupon['product_ids'] && in_array($item['id'], $coupon['product_ids'])) {
                        $apply_discount = true;
                    } elseif ($coupon['category'] && $item['category'] === $coupon['category']) {
                        $apply_discount = true;
                    } elseif (!$coupon['product_ids'] && !$coupon['category']) {
                        $apply_discount = true;
                    }
                    if ($apply_discount) {
                        if ($coupon['discount_type'] === 'percentage') {
                            $total_discount += ($item['price'] * $item['quantity'] * $coupon['discount_value']) / 100;
                        } elseif ($coupon['discount_type'] === 'fixed') {
                            // Apply fixed discount once per eligible item/category, not per quantity
                            $total_discount += $coupon['discount_value'];
                        }
                    }
                }

                // Ensure discount does not exceed the original total
                if ($total_discount > $original_total) {
                    $total_discount = $original_total;
                }

                echo json_encode(['success' => true, 'discount' => $total_discount, 'new_total' => $original_total - $total_discount]);
                exit();
            }
        }
    }
}
echo json_encode(['success' => false, 'message' => 'Invalid coupon code.']);
?>
