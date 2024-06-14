<?php

require_once appUtilities('dbCon.php');

$products = [];


try {
    $products = $db->query('select products.product_id, products.product_name, products.price, products.image_path from products where status = 1')->get();
} catch (Exception $e) {

    echo "Error, Can't seems to find the data" . $e->getMessage();
}


return $products;