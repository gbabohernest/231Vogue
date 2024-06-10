<?php

adminFunctions('validateCategoriesData.php');

use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//    dd($_POST);
    /**
     * Validate product data.
     *
     * @param array $data
     * @return array
     */

    $errors = validateCategoryData($_POST);

    if (!empty($errors)) {
        return view('admin/category/create.view.php', [
            'errors' => $errors,
        ]);
    }


    $status = $_POST['status'];
    $status_value = ($status === 'active') ? 1 : 0;

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