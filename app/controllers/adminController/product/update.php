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

    $selected_category = $_POST['category'];

    $product_id = $_POST['id'];

    $errors = ValidateInputs::validateProductData($errors);

    if (!empty($errors)) {

        $_SESSION['form_data'] = $_POST;

        return view('admin/product/edit.view.php', [
            'errors' => $errors,
            'selected_category' => $selected_category
        ]);
    }

    $image_path = $_POST['current_image_path'];
    $status_value = ValidateInputs::convertStatusToBool($_POST['status']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];

        try {

            $file_path = ValidateInputs::validateImgUpload($image);

            // delete the old image file if it is different from the updated
            if ($_POST['current_image_path'] && file_exists($_POST['current_image_path'])) {
                unlink($current_image_path);
            }


        } catch (Exception $e) {

            echo "Error Uploading the file" . $e->getMessage();
        }
    }


    // update the product
    try {
        $db->query("UPDATE products SET product_name = :product_name, price = :product_price, description = :product_desc, status = :product_status, sub_category_id = :selected_category, image_path = :image_path WHERE product_id = :product_id", [

            "product_name" => $_POST['name'],
            "product_price" => $_POST['price'],
            "product_desc" => $_POST['description'],
            "product_status" => $status_value,
            "selected_category" => $selected_category,
            "image_path" => $image_path,
            "product_id" => $product_id
        ]);

        echo "<script>alert('Data was inserted successfully!!!')</script>";

        header('location: /dashboard/products');

        exit();

    } catch (Exception $e) {
        echo "<script>alert('Error, something went wrong, DATA NOT UPDATED !!!!')</script>" . $e->getMessage();
    }


}