<?php

require_once appUtilities('dbCon.php');


if ($_GET['category_id'] && is_numeric($_GET['category_id']) !== null) {

    $category_id = $_GET['category_id'];


    try {
        $category = $db->query("SELECT * FROM categories WHERE category_id = :category_id", [
            'category_id' => $category_id
        ])->find();

    } catch (Exception $e) {
        echo "Error, Something went wrong!!" . $e->getMessage();
    }

//    dd($category);
}


view('admin/category/edit.view.php', [
    'category' => $category
]);