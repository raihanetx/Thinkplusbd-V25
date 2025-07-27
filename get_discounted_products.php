<?php
header('Content-Type: application/json');

function get_products_with_discounts() {
    $products_file_path = __DIR__ . '/products.json';
    if (!file_exists($products_file_path)) {
        return [];
    }

    $json_data = file_get_contents($products_file_path);
    $products = json_decode($json_data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return [];
    }

    $today = new DateTime();

    foreach ($products as &$product) {
        if (isset($product['discount']) && $product['discount']['status'] === 'active') {
            $start_date = isset($product['discount']['start_date']) ? new DateTime($product['discount']['start_date']) : null;
            $end_date = isset($product['discount']['end_date']) ? new DateTime($product['discount']['end_date']) : null;

            if ((!$start_date || $start_date <= $today) && (!$end_date || $end_date >= $today)) {
                $product['original_price'] = $product['price'];
                $discount_type = $product['discount']['type'];
                $discount_value = floatval($product['discount']['value']);

                if ($discount_type === 'percentage') {
                    $product['price'] = $product['original_price'] - ($product['original_price'] * ($discount_value / 100));
                } elseif ($discount_type === 'fixed') {
                    $product['price'] = $product['original_price'] - $discount_value;
                }
            }
        }
    }

    return $products;
}

echo json_encode(get_products_with_discounts());
?>
