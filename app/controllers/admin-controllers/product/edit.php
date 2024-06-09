<?php


use Core\Database;

$config = require base_path('config.php');


$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


if ($_GET['product_id'] && is_numeric($_GET['product_id']) !== null) {

    $product_id = $_GET['product_id'];

    //dd($product_id);

    $product = $db->query("SELECT * FROM products WHERE product_id = :product_id", [
        'product_id' => $product_id
    ])->find();

}


view('admin/product/edit.view.php', [
    'product' => $product,
]);