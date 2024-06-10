<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


// query the categories table and get the data from the table and give it to the view.

try {
    $categories = $db->query('SELECT * FROM categories ORDER BY category_id desc ')->get();
} catch (Exception $e) {
    echo 'Error in getting the result', $e->getMessage();
}


view('admin/category/index.php', [
    'categories' => $categories,
]);
