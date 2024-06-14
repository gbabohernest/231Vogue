<?php

require_once appUtilities('dbCon.php');

$product = [];


try {
    $product = $db->query('select * from products where product_id = :product_id', [
        'product_id' => $product_id

    ])->find();

} catch (Exception $e) {

    echo "Error, Can't seems to find the data" . $e->getMessage();
}

return $product;