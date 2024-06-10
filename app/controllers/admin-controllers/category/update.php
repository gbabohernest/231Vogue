<?php

use Core\Database;

adminFunctions('validateCategoriesData.php');


$config = require base_path('config.php');


$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


$errors = [];

//dd ($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category_id = $_POST['id'];
    $status = $_POST['status'];
    $status_value = ($status === 'active') ? 1 : 0;

    $errors = validateCategoryData($_POST);

    if (!empty($errors)) {

        $_SESSION['form_data'] = $_POST;

        return view('admin/category/edit.view.php', [
            'errors' => $errors,
        ]);
    }


    try {
        $db->query("UPDATE categories SET category_name = :name, description = :description, is_active = :status WHERE category_id = :id", [

            "name" => $_POST['name'],
            "description" => $_POST['description'],
            "status" => $status_value,
            "id" => $category_id
        ]);

        echo "<script>alert('Category updated successfully!!!')</script>";

        header('location: /dashboard/categories');

        exit();

    } catch (Exception $e) {

        echo "<script>alert('Error, something went wrong, DATA NOT UPDATED !!!!')</script>" . $e->getMessage();
    }
}