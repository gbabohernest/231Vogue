<?php

use app\CRUDInputsValidations\ValidateInputs;

require_once appUtilities('dbCon.php');


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = ValidateInputs::validateCategoryInputs($_POST);

    if (!empty($errors)) {

        $_SESSION['form_data'] = $_POST;

        return view('admin/category/edit.view.php', [
            'errors' => $errors,
        ]);
    }

    $category_id = $_POST['id'];
    $status_value = ValidateInputs::convertStatusToBool($_POST['status']);
    unset ($_SESSION['form_data']);


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