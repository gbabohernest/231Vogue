<?php


use app\CRUDInputsValidations\ValidateInputs;
use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


$errors = [];

//dd ($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sub_category_id = $_POST['id'];
    $selected_category = $_POST['category'];

    $errors = validateInputs::validateSubCatInputs($_POST);

    if (!empty($errors)) {

        $_SESSION['form_data'] = $_POST;

        return view('admin/sub-category/edit.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category
        ]);
    }
    $status_value = ValidateInputs::convertStatusToBool($_POST['status']);
    unset($_SESSION['form_data']);

    try {
        $db->query("UPDATE sub_categories SET sub_category_name = :name, category_id = :selected_category,  description = :description, is_active = :status WHERE sub_category_id = :sub_category_id", [

            "name" => $_POST['name'],
            'selected_category' => $selected_category,
            "description" => $_POST['description'],
            "status" => $status_value,
            "sub_category_id" => $sub_category_id
        ]);

        echo "<script>alert('Category updated successfully!!!')</script>";

        header('location: /dashboard/sub-categories');

        exit();

    } catch (Exception $e) {

        echo "<script>alert('Error, something went wrong, DATA NOT UPDATED !!!!')</script>" . $e->getMessage();
    }
}