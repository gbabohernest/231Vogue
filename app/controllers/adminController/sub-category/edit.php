<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


//dd ($_GET);

if ($_GET['sub_category_id'] && is_numeric($_GET['sub_category_id']) !== null) {

    $sub_category_id = $_GET['sub_category_id'];

    try {

        $sub_category = $db->query("SELECT * FROM sub_categories WHERE sub_category_id = :sub_category_id", [
            'sub_category_id' => $sub_category_id
        ])->find();

    } catch (Exception $e) {

        echo "Sorry, Failed to perform edit, something wrong!!" . $e->getMessage();
    }
}


view('admin/sub-category/edit.view.php', [
    'sub_category' => $sub_category
]);