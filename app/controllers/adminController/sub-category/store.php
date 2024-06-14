<?php

use app\CRUDInputsValidations\ValidateInputs;
use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $selected_category = $_POST['category'];

    $errors = ValidateInputs::validateSubCatInputs($_POST);

    if (!empty($errors)) {
        return view('admin/sub-category/create.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category,
        ]);
    }


    $status_value = ValidateInputs::convertStatusToBool($_POST['status']);

    try {
        $db->query('INSERT INTO  sub_categories (sub_category_name, category_id, description, is_active) VALUES (:name, :selected_category, :description, :status)', [

                'name' => $_POST['name'],
                'selected_category' => $selected_category,
                'description' => $_POST['description'],
                'status' => $status_value
            ]
        );

        echo "<script>alert('Category created successfully!!!')</script>";

        header('location: /dashboard/sub-categories');

        exit();


    } catch (Exception $e) {
        echo "<script>alert('Error, something went wrong, Data NOT INSERTED!!!!')</script>" . $e->getMessage();
    }

}