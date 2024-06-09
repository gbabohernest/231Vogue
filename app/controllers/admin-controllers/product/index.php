<?php


use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], [
    'password' => DB_PASSWORD,
]);


// query db
try {
    $products = $db->query('SELECT p.product_id, p.product_name, p.price, p.description, p.image, p.status, p.created_at, sc.sub_category_name from products p
            JOIN `231vogue_db`.sub_categories sc on p.sub_category_id = sc.sub_category_id order by p.product_id desc ')->get();

} catch (Exception $e) {
    echo 'Error in getting the result', $e->getMessage();
}


view('admin/product/index.php', [

    'products' => $products,
]);