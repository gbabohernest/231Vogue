<?php

use app\CRUDInputsValidations\ValidateInputs;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], [
    'password' => DB_PASSWORD
]);


$errors = [];
$selected_category = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    dd($_FILES);

    $selected_category = $_POST['category'];

    $errors = ValidateInputs::validateProductData($errors);


    if (!empty($errors)) {
        return view('admin/product/create.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category,
        ]);
    }


    if (!empty($selected_category) && is_numeric($selected_category)) {

        $status_value = ValidateInputs::convertStatusToBool($_POST['status']);
        $image = $_FILES['image'];

        try {

            /* if file upload successful get the file path*/

            $file_path = ValidateInputs::validateImgUpload($image);

        } catch (Exception $e) {

            echo "Error Uploading the file" . $e->getMessage();
        }


        try {
            $db->query('INSERT INTO products(product_name, price, description, sub_category_id, status, image_path) Values(
                          :name, :price, :desc,:sub_category_id, :status, :image_path)', [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'desc' => $_POST['description'],
                'sub_category_id' => $selected_category,
                'status' => $status_value,
                'image_path' => $file_path
            ]);


            echo "<script>alert('Data was inserted successfully!!!')</script>";

            header('location: /dashboard/products');

            exit();

        } catch (Exception $e) {
            echo "<script>alert('Error, something went wrong, Data NOT INSERTED!!!!')</script>" . $e->getMessage();
        }

    }

}