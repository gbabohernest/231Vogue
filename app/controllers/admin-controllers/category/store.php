<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = ValidateInputs::validateCategoryInputs($_POST);

    if (!empty($errors)) {
        return view('admin/category/create.view.php', [
            'errors' => $errors,
        ]);
    }


    $status_value = ValidateInputs::convertStatusToBool($_POST['status']);

    try {
        $db->query('INSERT INTO  categories (category_name, description, is_active) VALUES (:name, :description, :status)', [

                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'status' => $status_value
            ]
        );

        echo "<script>alert('Category created successfully!!!')</script>";

        header('location: /dashboard/categories');

        exit();


    } catch (Exception $e) {
        echo "<script>alert('Error, something went wrong, Data NOT INSERTED!!!!')</script>" . $e->getMessage();
    }

}