<?php


use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);

//dd ($_GET);

if ($_GET['category_id'] && is_numeric($_GET['category_id']) !== null) {

    $category_id = $_GET['category_id'];


    $category = $db->query("SELECT * FROM categories WHERE category_id = :category_id", [
        'category_id' => $category_id
    ])->find();

//    dd($category);
}


view('admin/category/edit.view.php', [
    'category' => $category
]);